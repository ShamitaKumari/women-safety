var db;
function indexedDBOk() {
	return "indexedDB" in window;
}
document.addEventListener("DOMContentLoaded", function() {
	//No support? Go in the corner and pout.
	if(!indexedDBOk) return;
	var openRequest = indexedDB.open("women_safe",1);
	openRequest.onupgradeneeded = function(e) {
		var thisDB = e.target.result;
		if(!thisDB.objectStoreNames.contains("people")) {
			var os = thisDB.createObjectStore("people", {autoIncrement:false});
			//I want to get by name later
			os.createIndex("number1", "number1", {unique:true});
			//I want another number to be unique
			os.createIndex("number2", "number2", {unique:true});
		}
	}
	openRequest.onsuccess = function(e) {
		db = e.target.result;
		//Listen for add clicks
		document.querySelector("#addButton").addEventListener("click", addPerson, false);
		//Listen for get clicks
		//document.querySelector("#getButton").addEventListener("click", getPeople, false);
	}
	openRequest.onerror = function(e) {
		//Do something for the error
	}
},false);
function addPerson(e) {
	var number1 = document.querySelector("#number1").value;
	var number2 = document.querySelector("#number2").value;
	console.log("About to add "+number1+"/"+number2);
	//Get a transaction
	//default for OS list is all, default for type is read
	var transaction = db.transaction(["people"],"readwrite");
	//Ask for the objectStore
	var store = transaction.objectStore("people");
	//Define a person
	var person = {
		number1:number1,
		number2:number2,
		created:new Date()
	}
	//Perform the add
	var request = store.add(person);
	request.onerror = function(e) {
		alert("Sorry, that number already exists.");
		console.log("Error",e.target.error.name);
		console.dir(e.target);
		//some type of error handler
	}

}
window.addEventListener('load',function getPeople(e) {
	//var number1 = document.querySelector("#number1").value;
	//var number2 = document.querySelector("#nameSearchEnd").value;
	//if(number1 == "" && number2 == "") return;
	var transaction = db.transaction(["people"],"readonly");
	var people = transaction.objectStore("people");
	people.getAll();
	console.log('Items by number:', people);
  });
	//var index = store.index("number1");
	//Make the range depending on what type we are doing
	//var range;
	//if(number1 != "" && number2 != "") {
		//range = IDBKeyRange.bound(number1, endname);
//	} else if(name == "") {
//		range = IDBKeyRange.upperBound(endname);
//	} else {
//		range = IDBKeyRange.lowerBound(name);
//	}
//	var s = "";
//	index.openCursor(range).onsuccess = function(e) {
//		var cursor = e.target.result;
//		if(cursor) {
//			s += "<h2>Key "+cursor.key+"</h2><p>";
//			for(var field in cursor.value) {
//				s+= field+"="+cursor.value[field]+"<br/>";
//			}
//			s+="</p>";
//			cursor.continue();
//		}
//		document.querySelector("#status").innerHTML = s;
//	}
//});
//function getdata(e) {
//	var transaction = db.transaction('people','readonly');
//
//	var people = transaction.objectStore('people');
//	return people.getAll();
  //}).then(function(items) {
	//console.log('Items by number:', items);
//  });
