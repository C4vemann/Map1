<!DOCTYPE html>
<html>
	<style>
		*{
			margin: 0;
			padding: 0;
		}
		br{
			clear: both;
		}
		.person{
			width: 100%;
			height: 100%;
			border-radius: 50%;
			background: blue;
		}
		.tree{
			width: 100%;
			height: 100%;
			background: green;
		}
		.mapBlock{
			width: 48px;
			height: 48px;
			border: 1px solid black;
			float: left;
		}
		.boundBlock{
			width: 100%;
			height: 100%;
			background: red;
		}
	</style>
	<body>
		<script>
			class MyMap{
				 constructor(x,y){
				 	this.map = new Array();
				 	this.mapEntities = new Array();

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

				 addNewEntity(x){
				 	this.mapEntities.push({
				 		id:this.mapEntities.length,
				 		object:x
				 	});
				 	this.placeObject(x);
				 }

				 placeObject(object){
				 	this.map[object.location[0]][object.location[1]].element.appendChild(object.element);
				 }

				 removeObject(id){
				 	let cache = this.mapEntities[id];
				 	this.map[cache.object.location[0]][cache.object.location[1]].element.removeChild(this.map[cache.object.location[0]][cache.object.location[1]].element.firstChild);
				 	this.mapEntities[id] = null;
				 }

				 //dont know why this works but it does
				 update(){
				 	for(let entity of this.mapEntities){
				 		this.placeObject(entity.object);
				 	}
				 }
			}

			class MapBlock{
				constructor(){
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
				move(x,y){
					this.location = [x,y];
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
				move(x,y){
					this.location = [x,y];
				}
				render(){
					let el = document.createElement("div");
					el.className = "tree";
					return el;
				}	
			}
			class BoundBlock{
				constructor(x,y){
					this.location = [x,y];
					this.element = this.render();
				}
				move(x,y){
					this.location = [x,y];
				}

				render(){
					let el = document.createElement("div");
					el.className = "boundBlock";
					return el;
				}	

			}

			let myMap = new MyMap(5,5);
			let myPerson = new Person(0,1);
			let tree1 = new Tree(2,2);
			let tree2 = new Tree(3,4);
			let tree3 = new Tree(0,0);
			document.getElementsByTagName("body")[0].appendChild(myMap.element);
			myMap.addNewEntity(myPerson);
			myMap.addNewEntity(tree1);
			myMap.addNewEntity(tree2);
			myMap.addNewEntity(tree3);
		</script>
	</body>
</html>