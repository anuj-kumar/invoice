var count = 0;
console.log(panel);
function addtable(tableID, num_of_panels) {
//    var num_of_panels = 8;
           var table = document.getElementById(tableID);
           var rowCount = table.rows.length;
           var row = table.insertRow(rowCount);
           
           var cell1 = row.insertCell(0);
           var element1 = document.createElement("input");
           element1.type = "text";
           element1.name = "vol_low[" + count + "]";
           element1.style.width = "20px";
           for(var i =1; i<=rowCount; i++ )
               {
                          element1.value = (panel[0][i-1].vol_low) ;
                   
               }
           cell1.appendChild(element1);

           var element2 = document.createElement("input");
           element2.type = "text";
           element2.name = "vol_high[" + count + "]";
           element2.style.width = "20px";
           for(var i =1; i<=rowCount; i++ )
               {
                          element2.value = (panel[0][i-1].vol_high) ;
               }
           cell1.appendChild(element2);
 
    //console.log(num_of_panels);

    
        for (var i = 1; i <= num_of_panels; i++) {
                
            //console.log(j);
            var cell = row.insertCell(i);
            var element = document.createElement("input");
            element.type = "text";
            element.name = "panel[" + count + "][]";
            element.style.width = "60px";
            console.log(panel[i-1][rowCount-1].name);
            element.value = (panel[i-1][rowCount-1].price);
            element.placeholder = "INR";
            cell.appendChild(element);
            if(i+1==num_of_panels) break;
        }
    
    count++;
 
}
 