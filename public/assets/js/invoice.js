var ct=0;
function addRow(tableID) {
    var table = document.getElementById(tableID);

    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);

    console.log(panel);

     
    var cell2 = row.insertCell(0);
     var newDiv = document.createElement('div');
    var selectHTML = "";
    selectHTML = "<input type='number' id='panel_qty"+ct+"' name='panel_qty"+ct+"' style='width:80px' onchange='panel_change(this,"+ct+");'>";
     selectHTML += "</input>";
    newDiv.innerHTML = selectHTML;
    cell2.appendChild(newDiv);
 
    var cell3 = row.insertCell(1);
    var newDiv = document.createElement('div');
    var selectHTML = "";
    selectHTML = "<select id='panel_select"+ct+"' name='panel_name"+ct+"' onchange='panel_change(this,"+ct+");'>";
    for (i = 0; i < panel.length; i = i + 1) {
        selectHTML += "<option value='" + panel[i].name + "'>" + panel[i].name + "</option>";
    }
    selectHTML += "</select>";
    newDiv.innerHTML = selectHTML;
    cell3.appendChild(newDiv);

    var cell4 = row.insertCell(2);
    var newDiv = document.createElement('div');
    var selectHTML = "";
    selectHTML = "<input id='panel_price"+ct+"' name='panel_price"+ct+"' style='width:80px' onchange='panel_change(this,"+ct+");'>";
     selectHTML += "</input>";
    newDiv.innerHTML = selectHTML;
    cell4.appendChild(newDiv);
    
 

    var cell5 = row.insertCell(3);
    var newDiv = document.createElement('div');
    var selectHTML = "";
    selectHTML = "<input id='panel_ext_price"+ct+"' name='panel_ext_price"+ct+"' style='width:80px' >";
     selectHTML += "</input>";
    newDiv.innerHTML = selectHTML;
    cell5.appendChild(newDiv);
    
    
    ct++;
 }
 function panel_change(oDDL,n){
        //var opt=document.getElementById('panel_select').
     panel_price="panel_price"+n;
     panel_ext="panel_ext_price"+n;
     panel_qty="panel_qty"+n;
     var qty=document.getElementById(panel_qty).value;
     for(var i=0;i<=panel.length;i++){   
     console.log(panel[i]);
        if(panel[i].name==oDDL.value){
             document.getElementById(panel_price).value=panel[i].price;
             document.getElementById(panel_ext).value=qty*panel[i].price;
             
        } 
    }
     
    }
 
        function deleteRow(tableID) {
                try {
                    var table = document.getElementById(tableID);
                    var rowCount = table.rows.length;
                    if(ct>0){
                    table.deleteRow(ct);
                    rowCount--;
                    ct--;
                     }
                } catch (e) {
                        alert(e);
                }
        }
 