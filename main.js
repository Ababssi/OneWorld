  
  import * as THREE from 'https://cdn.skypack.dev/pin/three@v0.134.0-dfARp6tVCbGvQehLfkdx/mode=imports/optimized/three.js';

  import atmosfragmentShader from './shaders/atmosphereFragment.glsl.js';
  import vertexShader from './shaders/vertex.glsl.js';
  import fragmentShader from './shaders/fragment.glsl.js';
  import atmosvertexShader from './shaders/atmosphereVertex.glsl.js';

  const canvasContainer = document.querySelector('#canvas')

  const scene = new THREE.Scene();
  const camera = new THREE.PerspectiveCamera(75,
            canvasContainer.offsetWidth/canvasContainer.offsetHeight,0.1,1000)

  const renderer = new THREE.WebGLRenderer({
    alpha: true,
    antilias: true,
    canvas: document.querySelector('canvas')
  })
  renderer.setSize(canvasContainer.offsetWidth, canvasContainer.offsetHeight)
  renderer.setPixelRatio(devicePixelRatio)

  const boxGeometry = new THREE.SphereGeometry(5,50,50)

  const material = new THREE.ShaderMaterial({
    vertexShader,
    fragmentShader,
    uniforms: {
      globeTexture: {
        value: new THREE.TextureLoader().load('./img/earth8k.jpg')
      }
    }
  })
  const globe = new THREE.Mesh(boxGeometry,material)
  
  scene.add(globe)

  const atmossphere = new THREE.SphereGeometry(5,50,50)
  const atmosmaterial = new THREE.ShaderMaterial({
    vertexShader: atmosvertexShader,
    fragmentShader: atmosfragmentShader,
    blending: THREE.AdditiveBlending,
    side: THREE.BackSide
  })
  const atmos = new THREE.Mesh(atmossphere,atmosmaterial)
  atmos.scale.set(1.1,1.1,1.1)
  
  scene.add(atmos)

  // const cloudNuage = new THREE.SphereGeometry(5,50,50)
  // const cloudmaterial = new THREE.ShaderMaterial({
  //   vertexShader,
  //   fragmentShader,
  //   uniforms: {
  //     globeTexture: {
  //       value: new THREE.TextureLoader().load('./img/cloudmap.jpg')
  //     }
  //   }
  // })
  // const cloud = new THREE.Mesh(cloudNuage,cloudmaterial)
  // atmos.scale.set(1.05,1.05,1.05)
  //scene.add(cloud)

  // const starGeometry = new THREE.BufferGeometry()
  // const starMaterial = new THREE.PointsMaterial({
  //   color:0xffffff
  // })
  // const starVertices = []
  // for (let i = 0; i<10000; i++){
  //   const x = (Math.random()-0.5) * 2000
  //   const y = (Math.random()-0.5) * 2000
  //   const z = -Math.random() * 2000
  //   starVertices.push(x,y,z)
  // }
  // starGeometry.setAttribute('position',new THREE.Float32BufferAttribute(starVertices,3))
  // const stars = new THREE.Points(starGeometry,starMaterial)
  // scene.add(stars)
  camera.position.z = 10

  // const planeGeometry = new THREE.PlaneGeometry(5,5,10,10)
  // const planeMaterial = new THREE.MeshPhongMaterial({color:0xFF0000,side: THREE.DoubleSide})
  // const planeMesh = new THREE.Mesh(planeGeometry,planeMaterial)
  //scene.add(planeMesh)

  const light = new THREE.DirectionalLight(0xffffff,1)

  light.position.set(0,0,1)
  
  scene.add(light)

document.addEventListener('mousemove',onDocumentMouseMove)

const windowX = window.innerWidth / 2;
const windowY = window.innerHeight / 2;

function onDocumentMouseMove(event){
  mouseX = (event.clientX - windowX)
  mouseY = (event.clientY - windowY)
}


let mouseX = 0;
let mouseY = 0;
let targetX = 0;
let targetY = 0;

const clock = new THREE.Clock()

function animate(){
  requestAnimationFrame(animate)
  renderer.render(scene,camera)
  const elapsedTime = clock.getElapsedTime()
  globe.rotation.y += 0.35 * elapsedTime

  targetX = mouseX * .001
  targetY = mouseY * .001

  globe.rotation.y += .5 * (targetX - globe.rotation.y)
  globe.rotation.x += .05 * (targetY - globe.rotation.x)
  globe.rotation.z += -.05 * (targetY - globe.rotation.x)
}
  animate()

