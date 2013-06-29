var count = 0;
function addRow(tableID, num_of_panels) {
//    var num_of_panels = 8;
       var table = document.getElementById(tableID);
       var rowCount = table.rows.length;
       var row = table.insertRow(rowCount);

       var cell1 = row.insertCell(0);
       var element1 = document.createElement("input");
       element1.type = "text";
       element1.name = "vol_low[" + count + "]";
       element1.style.width = "20px";
       cell1.appendChild(element1);

       var element2 = document.createElement("input");
       element2.type = "text";
       element2.name = "vol_high[" + count + "]";
       element2.style.width = "20px";
       cell1.appendChild(element2);
 
    console.log(num_of_panels);
    for (var i = 1; i <= num_of_panels; i++) {
        console.log(i);
        var cell = row.insertCell(i);
        var element = document.createElement("input");
        element.type = "text";
        element.name = "panel[" + count + "][]";
        element.style.width = "60px";
        element.placeholder = "INR";
        cell.appendChild(element);
    }
    count++;
 
}
 
console.log(count);
//window.onload=addRow('panel_table');
        function deleteRow(tableID) {
                try {
                    var table = document.getElementById(tableID);
                    var rowCount = table.rows.length;
                    if(count>0){
                    table.deleteRow(count);
                    rowCount--;
                    count--;
                     }
                } catch (e) {
                        alert(e);
                }
        }
 