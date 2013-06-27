function addRow(tableID) {
    
    var table = document.getElementById(tableID);

    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);

    var choices = [];
    choices[0] = "one";
    choices[1] = "two";

    function addInput(divName) {
        var newDiv = document.createElement('div');
        var selectHTML = "";
        selectHTML = "<select>";
        for (i = 0; i < choices.length; i = i + 1) {
            selectHTML += "<option value='" + choices[i] + "'>" + choices[i] + "</option>";
        }
        selectHTML += "</select>";
        newDiv.innerHTML = selectHTML;
        document.getElementById(divName).appendChild(newDiv);
    } 

                var cell1 = row.insertCell(0);
                var element1 = document.createElement("input");
                element1.type = "checkbox";
                element1.name = "chkbox[]";
                cell1.appendChild(element1);
 
//                        var cell2 = row.insertCell(1);
    //                      cell2.innerHTML = rowCount;
 
                var cell2 = row.insertCell(1);
    var element1 = document.createElement("input");
                element1.type = "number";
                element1.name = "quantity";
                element1.style.width = "40px";
    element1.placeholder = "Qty.";
                cell2.appendChild(element1);
 
        var cell3 = row.insertCell(2);
    var newDiv = document.createElement('div');
    var selectHTML = "";
    selectHTML = "<select>";
    for (i = 0; i < choices.length; i = i + 1) {
        selectHTML += "<option value='" + choices[i] + "'>" + choices[i] + "</option>";
    }
    selectHTML += "</select>";
    newDiv.innerHTML = selectHTML;


                cell3.appendChild(newDiv);
 
        var cell4 = row.insertCell(3);
    var element3 = document.createElement("input");
                element3.type = "text";
                element3.name = "unit_price";
    element3.placeholder = "unit price";
    element3.setAttribute("style", "width: 100px;");
                cell4.appendChild(element3);
 
        var cell5 = row.insertCell(4);
    var element4 = document.createElement("input");
                element4.type = "text";
                element4.name = "price";
    element4.placeholder = "price";
    element4.setAttribute("style", "width: 100px;");
                cell5.appendChild(element4);
 
 
        }
 
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
        }
 