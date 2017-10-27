// function startAjax(url, country) {
// var request = new XMLHttpRequest(); 

// request.onreadystatechange = function() { 
// if(request.readyState === 4) { 
// bio.style.border = '1px solid #e8e8e8'; 
// if(request.status === 200) { 
// bio.innerHTML = request.responseText; 
// } else { 
// bio.innerHTML = 'An error occurred during your request: ' + request.status + ' ' + request.statusText; 
// } 
// } 
// } 

// request.open('Get', 'Bio.txt'); 

// btn.addEventListener('click', function() { 
// this.style.display = 'none'; 
// request.send(); 
// });


// function startAjax(url){
//   var request; 
//   if(window.XMLHttpRequest){ 
//       request = new XMLHttpRequest(); 
//   } else if(window.ActiveXObject){ 
//       request = new ActiveXObject("Microsoft.XMLHTTP");  
//   } else { 
//       return; 
//   } 
  
//   request.onreadystatechange = function(){
//         switch (request.readyState) {
//           case 1: print_console("<br/><em>1: Подготовка к отправке...</em>"); break
//           case 2: print_console("<br/><em>2: Отправлен...</em>"); break
//           case 3: print_console("<br/><em>3: Идет обмен..</em>"); break
//           case 4:{
//            if(request.status==200){     
//                         print_console("<br/><em>4: Обмен завершен.</em>"); 
//                         document.getElementById("printResult").innerHTML = "<b>"+request.responseText+"</b>"; 
//                      }else if(request.status==404){
//                         alert("Ошибка: запрашиваемый скрипт не найден!");
//                      }
//                       else alert("Ошибка: сервер вернул статус: "+ request.status);
           
//             break
//             }
//         }       
//     } 
//     request.open ('GET', url, true); 
//     request.send (''); 
//   } 
//   function print_console(text){
//     document.getElementById("console").innerHTML += text; 
//   }
