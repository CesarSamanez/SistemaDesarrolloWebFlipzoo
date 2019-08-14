		var cronometro=[];
		var hora=[];
		var contador_s=[];
		var contador_m=[];
		var contador_h=[];
		var cronometro_s=[];
		var cronometro_m=[];
		var cronometro_h=[];
		var date=[];

		function mostrarhora(){
		var f=new Date();
		cad=f.getHours()+":"+f.getMinutes()+":"+f.getSeconds();
		window.status =cad;
		setTimeout("mostrarhora()",1000);
		}

		function detenerMesa(elem){
			var id=elem.id.substring(1,elem.id.length);
			s1=document.getElementById("segundof"+id);
			m1=document.getElementById("minutof"+id);
			h1=document.getElementById("horaf"+id);

			var f=new Date();

			h1.innerHTML= f.getHours();
			m1.innerHTML= f.getMinutes();
			s1.innerHTML = f.getSeconds();
			clearInterval(cronometro[id]);
			window.alert("Tiempo Finalizado Mesa #1: "+hora[id]);
			elem.disabled=true;
			document.getElementById("s"+id).disabled=false;
		}

		function cargaMesa(elem){




			var id=elem.id.substring(1,elem.id.length);
			console.log(id);
			s1=document.getElementById("segundof"+id);
			m1=document.getElementById("minutof"+id);
			h1=document.getElementById("horaf"+id);
			h1.innerHTML= "--";
			m1.innerHTML= "--";
			s1.innerHTML = "--";
			elem.disabled=true;
			document.getElementById("e"+id).disabled=false;

			s11=document.getElementById("segundoi"+id);
			m11=document.getElementById("minutoi"+id);
			h11=document.getElementById("horai"+id);

			var f=new Date();
			console.log(f);
			h11.innerHTML= f.getHours();
			m11.innerHTML= f.getMinutes();
			s11.innerHTML = f.getSeconds();
			console.log(new Date().toJSON().slice(0, 19).replace('T', ' '));
			var mySQLDate = '2015-04-29 10:29:08';
			console.log(new Date(Date.parse(mySQLDate.replace('-','/','g'))));

			contador_s[id]=1;
			contador_m[id]=0;
			contador_h[id]=0;
			cronometro_s[id]=document.getElementById("segundos"+id);
			cronometro_m[id]=document.getElementById("minutos"+id);
			cronometro_h[id]=document.getElementById("horas"+id);

			cronometro[id]=setInterval(function(){
				if(contador_s[id]==60){
					contador_s[id]=0;
					contador_m[id]++;
					cronometro_m[id].innerHTML = contador_m[id];

					if(contador_m[id]==59){
						contador_m[id]=0;
						contador_h[id]++;
						cronometro_h[id].innerHTML=contador_h[id];
					}
				}

				hora[id]=contador_h[id]+" horas, "+contador_m[id]+" minutos, "+contador_s[id]+" segundos";
				cronometro_s[id].innerHTML = contador_s[id];
				contador_s[id]++;

			},1000);
		}
