<template>
<div>	
<div id="cont">

<div class="input">

		<label>City/state/country<small style="font-size: 10px;">(press space to autocomplete)</small></label>
		<br>
        <input type=" text " v-on:keyup.space='nameenter' v-on:keyup.backspace='nameenter'  v-model="name" placeholder="name"  >
	<div v-show="name"  >
		<ul class="subgs">

			 <div v-for="na in NAME"  class="f">

    	   		<li @click="select(na)"  :class="{ 'selected ':na==selected}">{{na.display_name}}
    	   		</li>
                
     		</div>
		</ul>
	</div> 
	 
	                  <br>
	                  <br>
	<label>Area</label> <br>
	  <input type="text" v-model="area">  <br><br>
	<label>building/colony</label> <br>
	  <input type="text" v-model="colony">  <br><br>
	<label>H.NO/FLAT NO</label>  <br>
	  <input type="text" v-model="house">  <br><br>
	  </div>
	  <div id="space"></div> 
	  <div  class="pin ">
	  	<label>PIN CODE</label>
	  	<input type="text"  v-model="pin" v-on:keyup.enter='pincall' >
	  <div v-show="pin"  >
		<ul class="subgs">

			 <div v-for="na in NAME"  class="f">

    	   		<li @click="select(na)"  :class="{ 'selected ':na==selected}">{{na.display_name}}
    	   		</li>
                
     		</div>
		</ul>
	</div> 
	</div>
</div>
<button  type="sumbit"  @click="store" class="btn btn-primary but" ><a href="/home" style="color: white;">  save&update</a></button>
</div>
</template>

<script type="text/javascript">
	
 


	export default {

		data(){
			return {
				'pin':"",
'NAME':"",

			'name':"",
			'area':"",
			'colony':"",
			'house':"",
			'sugs':{ 
           	type:Object,
           default: null
       },
       selected:null
   };},


         methods:{
         	nameenter:function(){
          axios.post('/ser',{name:this.name}).then((response) => {
            this.sugs=response.data;
           
          this.NAME=this.sugs;
          if(this.name==""){
          	this.NAME="";
          }
          })
        },
        pincall:function(){
          axios.post('/serpin',{pin:this.pin}).then((response) => {
            this.sugs=response.data;
           
          this.NAME=this.sugs;
          if(this.pin==""){
          	this.NAME="";
          }
          })
        },
        store : function(){
        	axios.post('ser/store',{name:this.name,
			'area':this.area,
			'colony':this.colony,
			'house':this.house,
			
		}).then((response)=>{

           
		})
        },
        select:function(na){
        	this.selected =na;
        	this.name=na.display_name;
        	this.NAME=null;
        	console.log(this.selected.display_name);

        }
       
               	
},
mounted(){
	axios.get("/get").then((response)=>{
		this.name=response.data[0].Mainadd;
		this.area=response.data[0].area;
		this.colony=response.data[0].colony;
		this.house=response.data[0].house;
	})
}
		
	
	}
</script>
<style type="text/css">
	 input {
	 	 width: 300px;

	 }
	 .subgs{ padding: 0px;
	 	max-width: 300px;
	 	text-decoration-style: none;list-style-type: none;
	 	margin: 0px;
	 }
	 ul{
	 	border-bottom:  0.5px solid lightgray;
	 }
	 li{border: 0.5px solid lightgray;
	 	border-bottom: 0px;
	  font-size: 10px;
	 }
div.f{ max-height: 15px; }
hr{margin: 0px;}
li:hover{
	background-color: lightblue;
}
label{ margin:1px;
font-size: 20px; }
#cont{
	 display: flex;

}
.input{
	flex: 1;
	margin-left: 50px;

}
.pin{
	
padding:100px;
flex: 1;
}
#space{
	flex: 0.5;
}
.but{
	margin-left: 350px
  }
</style>