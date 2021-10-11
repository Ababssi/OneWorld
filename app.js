//-----------------------------------------------------------------------------------
//----------------------------------DonnéesInputSelect-------------------------------
function ficheCountry()
{
	let rechP = document.getElementById('select-country').value;
	window.location.href = 'http://oneworld.cyberdevweb.fr/index.php?url=country/country.Name:'+rechP;
}
function ficheCity()
{
	let rechV = document.getElementById('select-city').value;
	window.location.href = 'http://oneworld.cyberdevweb.fr/index.php?url=city/city.Name:'+rechV;
	//document.getElementById('debugCity').textContent = rechV;
}
function ficheLang()
{
	let rechL = document.getElementById('select-language').value;
	window.location.href = 'http://oneworld.cyberdevweb.fr/index.php?url=countrylanguage/countrylanguage.Language:'+rechL;
}
//---------------------------------------country-----------------------------------
function afficheRech1()
{
	let ByLangFrCount = document.getElementById('selectByLang').value;
	let ByContFrCount = document.getElementById('selectByContForCountry').value;
	let ByPopuFrCount = document.getElementById('selectByPopuForCountry').value;

	lien = 'http://oneworld.cyberdevweb.fr/index.php?url=country';

	if (ByLangFrCount){lien+='/countrylanguage.Language:'+ByLangFrCount;}
	if (ByContFrCount!=="*"){lien+='/country.Continent:'+ByContFrCount;}
	if (ByPopuFrCount!=="*"){lien+='/country.Population>:'+ByPopuFrCount;}

	window.location.href = lien;
	
}
//-----------------------------------------city-----------------------------------
function afficheRech2()
{
	let ByCtFrCity = document.getElementById('selectByContForCity').value;
	let ByPoFrCity = document.getElementById('selectByPopuForCity').value;

	lien = 'http://oneworld.cyberdevweb.fr/index.php?url=city';

	if (ByCtFrCity!=="*"){lien+='/country.Continent:'+ByCtFrCity;}
	if (ByPoFrCity!=="*"){lien+='/city.Population>:'+ByPoFrCity;}

	window.location.href = lien;
}
//---------------------------------------Language----------------------------------
function afficheRech3()
{
	let ByCtFrLang = document.getElementById('selectByContForLang').value;
	let ByOffFrLang = document.getElementById('selectByOff').value;
	let ByCountFrLang = document.getElementById('selectByCoun').value;

	lien = 'http://oneworld.cyberdevweb.fr/index.php?url=countrylanguage';
	
	if (ByCtFrLang!=="*"){lien+='/country.Continent:'+ByCtFrLang;}
	if (ByOffFrLang!=="*"){lien+='/IsOffical:'+ByOffFrLang;}
	if (ByCountFrLang){lien+='/country.Name:'+ByCountFrLang;}

	window.location.href = lien;
}
//----------------------------------------------------------------------------------------
//-----------------------------------FonctionTraitement-----------------------------------

//----------------------------------------------------------------------------------------
//----------------------------------DisparitionApparition---------------------------------

let sBarCity = document.getElementById('rechCity');
let sBarCoun = document.getElementById('rechCountry');
let sBarLang = document.getElementById('rechLangue');
let cardCity = document.getElementById('cardcity');
let cardCoun = document.getElementById('cardcoun');
let cardLang = document.getElementById('cardlang');
cardCity.addEventListener("mouseover",function ()
{
	sBarCity.style.display = "block";
	cardCity.classList.toggle('cellSelected');
	sBarCoun.style.display = "none";
	cardCoun.classList.remove('cellSelected');
	sBarLang.style.display = "none";
	cardLang.classList.remove('cellSelected');
});
cardCoun.addEventListener("mouseover",function ()
{
	sBarCoun.style.display = "block";
	cardCoun.classList.toggle('cellSelected');
	sBarCity.style.display = "none";
	cardCity.classList.remove('cellSelected');
	sBarLang.style.display = "none";
	cardLang.classList.remove('cellSelected');
});
cardLang.addEventListener("mouseover",function ()
{
	sBarLang.style.display = "block";
	cardLang.classList.toggle('cellSelected');
	sBarCoun.style.display = "none";
	cardCoun.classList.remove('cellSelected');
	sBarCity.style.display = "none";
	cardCity.classList.remove('cellSelected');
});

//----------------------------------------------------------------------------------------
//----------------------------------InputTomSelect----------------------------------------
new TomSelect('#select-country',{
	valueField: 'NameCountry',
	labelField: 'NameCountry',
	searchField: ['NameCountry'],
	// fetch remote data
	load: function(query, callback) 
	{
		var self = this;
		if( self.loading > 1 )
		{
			callback();
			return;
		}
		var url = 'http://oneworld.cyberdevweb.fr/countryFulldataCapitalcityMainlanguage.json';
		fetch(url)
			.then(response => response.json())
			.then(json => {
						    callback(json.result.list);
						    self.settings.load = null;
						  }).catch(()=>{callback();});
	},
	// custom rendering function for options
	render: {
		option: function(item, escape) {
			return `<div class="cellSelected">
						<div>
							<img class="imgSelect" src="sources/svg/${ escape(item.Code) }.svg" alt="drapeau"> 
						</div>
						<div>
							<p class="rh1">${ escape(item.NameCountry) }</p>
						</div>
						<div>
							<p class="rh2">${ escape(item.Name) }</p>
						</div>
						<div>
							<p class="rh2">${ escape(item.Continent) }</p>
						</div>
						<div>
							<p class="rh3">${ escape(item.Population) }</p> 
						</div>
						<div">
							<p class="rh4">${ escape(item.SurfaceArea) }</p>
						</div>
						<div>
							<p class="rh4">${ escape(item.Language) }</p> 
						</div>
					</div>`;
		}
	},
});
//----------------------------------------------------------------------------------------
new TomSelect('#select-city',{
	valueField: 'Name',
	labelField: 'Name',
	searchField: ['Name','District','Population','CountryCode'],
	// fetch remote data
	load: function(query, callback) 
	{
		var self = this;
		if( self.loading > 1 )
		{
			callback();
			return;
		}
		var url = 'http://oneworld.cyberdevweb.fr/cityFulldataCountryName.json';
		fetch(url)
			.then(response => response.json())
			.then(json => {
						    callback(json.result.list);
						    self.settings.load = null;
						  }).catch(()=>{callback();});
	},
	// custom rendering function for options
	render: {
		option: function(item, escape) {
			return `<div class="py-2 d-flex">
						<div class="mb-1">
							<span class="h4">
								${ escape(item.Name) }  
							</span>
							<span class="h5">
								District : ${ escape(item.District) }
							</span>
							<span class="h5">
								Country : ${ escape(item.IsCapital) }
							</span>
							<span class="h5">
								Country : ${ escape(item.NameCountry) }
							</span>							
						</div>
						<div class="ms-auto">
						 Population : ${ escape(item.Population) }
						</div>
					</div>`;
		}
	},
});
//----------------------------------------------------------------------------------------
new TomSelect('#select-language',{
	valueField: 'Language',
	labelField: 'Language',
	searchField: ['Language','IsOfficial','Percentage','CountryCode'],
	// fetch remote data
	load: function(query, callback) 
	{
		var self = this;
		if( self.loading > 1 )
		{
			callback();
			return;
		}
		var url = 'http://oneworld.cyberdevweb.fr/languageFulldataMaincountry.json';
		fetch(url)
			.then(response => response.json())
			.then(json => {
						    callback(json.result.list);
						    self.settings.load = null;
						  }).catch(()=>{callback();});l
	},
	// custom rendering function for options
	render: {
		option: function(item, escape) {
			return `<div class="py-2 d-flex">
						<div class="mb-1">
							<span class="h4">
								${ escape(item.Language) }
							</span>
							<span class="h4">
							${ escape(item.Percentage) } %
							</span>
							<span class="h4">
							in ${ escape(item.CountryCode) } 
							</span>
						</div>
						<div class="ms-auto">
						 	isOfficial ? : ${ escape(item.IsOfficial) } 
						</div>
					</div>`;
		}
	},
});
//----------------------------------------------------------------------------------------
new TomSelect('#selectByLang',{
	valueField: 'Language',
	labelField: 'Language',
	searchField: ['Language'],
	// fetch remote data
	load: function(query, callback) 
	{
		var self = this;
		if( self.loading > 1 )
		{
			callback();
			return;
		}
		var url = 'http://oneworld.cyberdevweb.fr/onlyLangueName.json';
		fetch(url)
			.then(response => response.json())
			.then(json => {
						    callback(json.result.list);
						    self.settings.load = null;
						  }).catch(()=>{callback();});
	},
	// custom rendering function for options
	render: {
		option: function(item, escape) {
			return `<div class="py-2 d-flex">
						<div class="mb-1">
							<span class="h4">
								${ escape(item.Language) }
							</span>
					</div>`;
		}
	},
});
//----------------------------------------------------------------------------------------	
new TomSelect('#selectByCoun',{
	valueField: 'Name',
	labelField: 'Name',
	searchField: ['Name'],
	// fetch remote data
	load: function(query, callback) 
	{
		var self = this;
		if( self.loading > 1 )
		{
			callback();
			return;
		}
		var url = 'http://oneworld.cyberdevweb.fr/onlyCountryName.json';
		fetch(url)
			.then(response => response.json())
			.then(json => {
						    callback(json.result.list);
						    self.settings.load = null;
						  }).catch(()=>{callback();});
	},
	// custom rendering function for options
	render: {
		option: function(item, escape) {
			return `<div class="py-2 d-flex">
						<div class="mb-1">
							<span class="h4">
								${ escape(item.Name) }
							</span>					
					</div>`;
		}
	},
});