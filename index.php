<!DOCTYPE html>
<html>
	<style>
		br{
			clear: both;
		}
		.person{
			width: 100%;
			height: 100%;
			border-radius: 50%;
			background: red;
		}
		.tree{
			width: 100%;
			height: 100%;
			background: green;
		}
		.mapBlock{
			width: 50px;
			height: 50px;
			border: 1px solid black;
			float: left;
		}
	</style>
	<body>
		<script>
			class MyMap{
				 constructor(x,y){
				 	this.map = new Array();
				 	for(let i = 0; i < x; i++){
				 		this.map.push(new Array());
				 		for(let j = 0; j < y; j++){
				 			this.map[i].push(new MapBlock());
				 		}
				 	}

				 	this.element = this.render();
				 }

				 render(){
				 	let el = document.createElement("div");
				 	for(let i = 0; i < this.map.length; i++){
				 		for(let j = 0; j < this.map[i].length; j++){
				 			el.appendChild(this.map[i][j].element);
				 		}
				 		el.appendChild(document.createElement("br"));
				 	}
				 	return el;
				 }

				 placeObject(person){
				 	this.map[person.location[0]][person.location[1]].element.appendChild(person.element);
				 }
			}
			class MapBlock{
				constructor(){
					this.value = 5;
					this.element = this.render();
				}
				render(){
					let el = document.createElement("div");
					el.className = "mapBlock";
					return el;
				}
			}
			class Person{
				constructor(x,y){
					this.location = [x,y];
					this.element = this.render();
				}
				render(){
					let el = document.createElement("div");
					el.className = "person";
					return el;
				}
			}
			class Tree{
				constructor(x,y){
					this.location = [x,y];
					this.element = this.render();
				}
				render(){
					let el = document.createElement("div");
					el.className = "tree";
					return el;
				}	
			}
			let myMap = new MyMap(5,5);
			let myPerson = new Person(0,1);
			let tree1 = new Tree(2,2);
			let tree2 = new Tree(3,4);
			let tree3 = new Tree(0,0);
			document.getElementsByTagName("body")[0].appendChild(myMap.element);
			myMap.placeObject(myPerson);
			myMap.placeObject(tree1);
			myMap.placeObject(tree2);
			myMap.placeObject(tree3);
		</script>
	</body>
</html>