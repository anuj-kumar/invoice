var count = 0;
function addRow(tableID) {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);

            var cell1 = row.insertCell(0);
            var element1 = document.createElement("input");
            element1.type = "text";
            element1.name = "vol_low["+count+"]";
            element1.style.width = "20px";
            cell1.appendChild(element1);

                var element2 = document.createElement("input");
            element2.type = "text";
            element2.name = "vol_high["+count+"]";
            element2.style.width = "20px";
            cell1.appendChild(element2);
 

            var cell2 = row.insertCell(1);
    var element3 = document.createElement("input");
                element3.type = "text";
                element3.name = "panel["+count+"][]";
                element3.style.width = "60px";
    element3.placeholder = "INR";
                cell2.appendChild(element3);
 
                var cell3 = row.insertCell(2);
    var element4 = document.createElement("input");
            element4.type = "text";
            element4.name = "panel["+count+"][]";
            element4.style.width = "60px";
    element4.placeholder = "INR";
        cell3.appendChild(element4);
 

                var cell4 = row.insertCell(3);
    var element5 = document.createElement("input");
            element5.type = "text";
            element5.name = "panel["+count+"][]";
            element5.style.width = "60px";
    element5.placeholder = "INR";
        cell4.appendChild(element5);
 

                var cell5 = row.insertCell(4);
    var element6 = document.createElement("input");
            element6.type = "text";
            element6.name = "panel["+count+"][]";
            element6.style.width = "60px";
    element6.placeholder = "INR";
        cell5.appendChild(element6);


                var cell6 = row.insertCell(5);
    var element7 = document.createElement("input");
            element7.type = "text";
            element7.name = "panel["+count+"][]";
            element7.style.width = "60px";
    element7.placeholder = "INR";
        cell6.appendChild(element7);


                var cell7 = row.insertCell(6);
    var element8 = document.createElement("input");
            element8.type = "text";
            element8.name = "panel["+count+"][]";
            element8.style.width = "60px";
    element8.placeholder = "INR";
        cell7.appendChild(element8);


                var cell8 = row.insertCell(7);
    var element9 = document.createElement("input");
            element9.type = "text";
            element9.name = "panel["+count+"][]";
            element9.style.width = "60px";
    element9.placeholder = "INR";
        cell8.appendChild(element9);
 

                var cell9 = row.insertCell(8);
    var element10 = document.createElement("input");
            element10.type = "text";
            element10.name = "panel["+count+"][]";
            element10.style.width = "60px";
    element10.placeholder = "INR";
        cell9.appendChild(element10);
 

                var cell10 = row.insertCell(9);
    var element11 = document.createElement("input");
            element11.type = "text";
            element11.name = "panel["+count+"][]";
            element11.style.width = "60px";
    element11.placeholder = "INR";
        cell10.appendChild(element11);
 
        }
 
//window.onload=addRow('panel_table');
        function deleteRow(tableID) {
                try {
                    var table = document.getElementById(tableID);
                    var rowCount = table.rows.length;
 
                    for (var i = 0; i < rowCount; i++) {
                            var row = table.rows[i];
                            var chkbox = row.cells[0].childNodes[0];
                            if (null != chkbox && true == chkbox.checked) {
                                    table.deleteRow(i);
                                    rowCount--;
                                    i--;
                            }
 
 
                    }
                } catch (e) {
                        alert(e);
                }
    count++;
        }
 