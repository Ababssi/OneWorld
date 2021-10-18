//-----------------------------------------------------------------------------------
//----------------------------------DonnéesInputSelect-------------------------------
function ficheCountry()
{
	let rechP = document.getElementById('select-country').value;
	window.location.href = 'http://oneworld.cyberdevweb.fr/index.php?url=country/read/country.NameCountry:'+rechP;
}
function ficheCity()
{
	let rechV = document.getElementById('select-city').value;
	window.location.href = 'http://oneworld.cyberdevweb.fr/index.php?url=city/read/city.Name:'+rechV;
	//document.getElementById('debugCity').textContent = rechV;
}
function ficheLang()
{
	let rechL = document.getElementById('select-language').value;
	window.location.href = 'http://oneworld.cyberdevweb.fr/index.php?url=countrylanguage/read/countrylanguage.Language:'+rechL;
}
//---------------------------------------country-----------------------------------
function afficheRech1()
{
	let ByLangFrCount = document.getElementById('selectByLang').value;
	let ByContFrCount = document.getElementById('selectByContForCountry').value;
	let ByPopuFrCount = document.getElementById('selectByPopuForCountry').value;

	lien = 'http://oneworld.cyberdevweb.fr/index.php?url=country/read';

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
	let ByCoFrCity = document.getElementById('selectByCoun').value;

	lien = 'http://oneworld.cyberdevweb.fr/index.php?url=city/read';

	if (ByCtFrCity!=="*"){lien+='/country.Continent:'+ByCtFrCity;}
	if (ByPoFrCity!=="*"){lien+='/city.Population>:'+ByPoFrCity;}
	if (ByCoFrCity){lien+='/country.NameCountry:'+ByCoFrCity;}

	window.location.href = lien;
}
//---------------------------------------Language----------------------------------
function afficheRech3()
{
	let ByCtFrLang = document.getElementById('selectByContForLang').value;
	let ByOffFrLang = document.getElementById('selectByOff').value;
	let ByCountFrLang = document.getElementById('selectByCoun2').value;

	lien = 'http://oneworld.cyberdevweb.fr/index.php?url=countrylanguage/read';
	
	if (ByCtFrLang!=="*"){lien+='/country.Continent:'+ByCtFrLang;}
	if (ByOffFrLang!=="*"){lien+='/IsOfficial:'+ByOffFrLang;}
	if (ByCountFrLang){lien+='/country.NameCountry:'+ByCountFrLang;}

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
cardCity.addEventListener("click",function ()
{
	sBarCity.style.display = "block";
	cardCity.classList.toggle('cellSelected');
	sBarCoun.style.display = "none";
	cardCoun.classList.remove('cellSelected');
	sBarLang.style.display = "none";
	cardLang.classList.remove('cellSelected');
});
cardCoun.addEventListener("click",function ()
{
	sBarCoun.style.display = "block";
	cardCoun.classList.toggle('cellSelected');
	sBarCity.style.display = "none";
	cardCity.classList.remove('cellSelected');
	sBarLang.style.display = "none";
	cardLang.classList.remove('cellSelected');
});
cardLang.addEventListener("click",function ()
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
			return `<div class="containSelect">					 		 	
						<img class="imgSelect" src="/sources/svg/${ escape(item.Code) }.svg" alt="drapeau">						
						<p class="rh1">${ escape(item.NameCountry) }</p>							
						<p class="rh1">${ escape(item.Name) }</p>				
						<p class="rh1">${ escape(item.Continent) }</p>			
						<p class="rh1">${ escape(item.Population) } ppl</p> 				
						<p class="rh1">${ escape(item.SurfaceArea) } km²</p>							
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
			return `<div class="containSelect">					 		 	
						<img class="imgSelect" src="/sources/svg/${ escape(item.Code) }.svg" alt="drapeau">						
						<p class="rh3">${ escape(item.Name) }</p>							
						<p class="rh4">${ escape(item.NameCountry) }</p>				
						<p class="rh4">${ escape(item.IsCapital) }</p>			
						<p class="rh5">${ escape(item.Population) } ppl</p> 											
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
			return `<div class="containSelect">					 		 	
						<img class="imgSelect" src="/sources/svg/${ escape(item.Code) }.svg" alt="drapeau">						
						<p class="rh3">${ escape(item.Language) }</p>							
						<p class="rh4">${ escape(item.NameCountry) }</p>				
						<p class="rh4">${ escape(item.IsOfficial) }</p>			
						<p class="rh5">${ escape(item.percentage) } %</p> 											
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
		var url = 'http://oneworld.cyberdevweb.fr/languageFulldataMaincountry.json';
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
			return `<div class="containSelect">					 		 	
						<p class="rh3">${ escape(item.Language) }</p> 											
					</div>`;

		}
	},
});
//----------------------------------------------------------------------------------------	
new TomSelect('#selectByCoun',{
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
			return `<div class="containSelect">					 		 	
						<p class="rh3">${ escape(item.NameCountry) }</p> 											
					</div>`;
		}
	},
});

//----------------------------------------------------------------------------------------	
new TomSelect('#selectByCoun2',{
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
			return `<div class="containSelect">					 		 	
						<p class="rh3">${ escape(item.NameCountry) }</p> 											
					</div>`;
		}
	},
});