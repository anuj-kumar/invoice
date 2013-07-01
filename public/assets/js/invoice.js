var ct=0;
var vol=0;
var total=0;
var flag=0;
function addRow(tableID) {
    
    var table = document.getElementById(tableID);
    console.log(panel);
    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);
    console.log('row added');

     
    var cell2 = row.insertCell(0);
    var newDiv = document.createElement('div');
    var selectHTML = "";
    selectHTML = "<input type='number' id='panel_qty"+ct+"' name='panel_qty["+ct+"]' style='width:80px' onkeyup='change("+ct+");' required>";
    selectHTML += "</input>";
    newDiv.innerHTML = selectHTML;
    cell2.appendChild(newDiv);
 
    var cell3 = row.insertCell(1);
    var newDiv = document.createElement('div');
    var selectHTML = "";
    selectHTML = "<select id='panel_select"+ct+"' name='panel_name["+ct+"]' onchange='panel_change(this,"+ct+");' required>";
    for (i = 0; i < panel.length; i++) {
        selectHTML += "<option value='" + panel[i][vol].id + "'>" + panel[i][vol].name + "</option>";
    }
    selectHTML += "</select>";
    newDiv.innerHTML = selectHTML;
    cell3.appendChild(newDiv);

    var cell4 = row.insertCell(2);
    var newDiv = document.createElement('div');
    var selectHTML = "";
    selectHTML = "<input id='panel_price"+ct+"' name='panel_price["+ct+"]' style='width:80px' onkeyup='price_change("+ct+");'  required>";
    selectHTML += "</input>";
    newDiv.innerHTML = selectHTML;
    cell4.appendChild(newDiv);
    
 

    var cell5 = row.insertCell(3);
    var newDiv = document.createElement('div');
    var selectHTML = "";
    selectHTML = "<input id='panel_ext_price"+ct+"' name='panel_ext_price["+ct+"]' value='0' style='width:80px' onkeydown='price_change("+ct+");' disabled>";
    selectHTML += "</input>";   
    newDiv.innerHTML = selectHTML;
    cell5.appendChild(newDiv);
    
    
    ct++;
 }
 function panel_change(oDDL,n){
     console.log('panel changed');   
     panel_price="panel_price"+n;
     panel_ext="panel_ext_price"+n;
     panel_qty="panel_qty"+n;
     var qty=document.getElementById(panel_qty).value;
     if(isNaN(qty)) qty=0;
     for(var i=0;i<panel.length;i++){   
     //console.log(panel[i]);
     if(panel[i][vol].id==oDDL.value){
             document.getElementById(panel_price).value=panel[i][vol].price;
             document.getElementById(panel_ext).value=qty*panel[i][vol].price;
             
        } 
    }
     amt();
    }

 function price_change(n){
  console.log('unit price changed');
     panel_price="panel_price"+n;
     panel_ext="panel_ext_price"+n;
     panel_qty="panel_qty"+n;
     panel_name="panel_select"+n;
     var name=document.getElementById(panel_name).value;
     var qty=document.getElementById(panel_qty).value;
     if(isNaN(qty)) qty=0;
     for(var i=0;i<panel.length;i++){   
        if(panel[i][vol].id==name){
             document.getElementById(panel_ext).value=qty*(document.getElementById(panel_price).value);
             
        } 
    }
    amt(); 
    }
    var vol_count=0;
 function change(n){
     
     console.log('Qty changed');   
     panel_price="panel_price"+n;
     panel_ext="panel_ext_price"+n;
     panel_qty="panel_qty"+n;
     panel_name="panel_select"+n;
     var name=document.getElementById(panel_name).value;
     var qty=parseInt(document.getElementById(panel_qty).value);
     if(isNaN(qty)) qty=0;
     //console.log(qty);
     //if(vol_count==1 && vol==0) vol=1;
     //if(qty >= panel[0][vol].vol_high ){ console.log('high');vol++; flag=1;  vol_count=1;}
     //else if(flag==1 && qty <= panel[0][vol-1].vol_high  ){ console.log('low');vol--; flag=0;}
     //if(qty >= panel[0][vol].vol_high && flag==1) console.log(qty);
     //console.log('flag:'+flag+'vol:'+vol);
     //console.log(panel[0][vol].vol_high);
     find_vol(qty);
     for(var i=0;i<panel.length;i++){
     if(panel[i][vol].id==name){
             document.getElementById(panel_price).value=panel[i][vol].price;
             document.getElementById(panel_ext).value=qty*panel[i][vol].price;
             
        } 
    }
      amt();
    }
   
    function amt(){
        total=0;
        for(var i=0;i<ct;i++){
         panel_price="panel_ext_price"+i;
         var value=parseFloat(document.getElementById(panel_price).value);
         total=total+value;
        // console.log('total:'+total);
        }
        document.getElementById('total').value=total;
    } 
 
    function find_vol(qty){
        
        var len=panel[0].length;
        var low = 0;
        console.log(qty)
        for(var i=0;i<len;i++){
                console.log(i);
                if(qty > low  && qty < parseInt(panel[0][i].vol_high) )
                {  
                    console.log(low+' '+ parseInt(panel[0][i].vol_high));
                    vol=i;
                    console.log(low+' '+ qty +' '+ parseInt(panel[0][i].vol_high));
                    
                   
                }
                low=panel[0][i].vol_high;
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
                total=0;
        //console.log('xyz');
        for(var i=0;i<ct;i++){
         panel_price="panel_ext_price"+i;
         var value=parseFloat(document.getElementById(panel_price).value);
         total=total+value;
         console.log('total:'+total);
        }
        document.getElementById('total').value=total;
                    console.log('row deleted');
                         }
                } catch (e) {
                        alert(e);
                }
         }
 