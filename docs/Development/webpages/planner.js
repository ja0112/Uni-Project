function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else if (str == "#") {
        document.getElementById("txtHint").innerHTML = "Please select an option!";
        return;
      } else if (str == "Day") {
          return showDay();
  } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","planner-week.php?="+str,true);
        xmlhttp.send();
    }
}

function showDay(str) {
    if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","planner-day.php?="+str,true);
        xmlhttp.send();
    }

    function showDayNext(str) {
        if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","planner-day-next.php?="+str,true);
            xmlhttp.send();
        }

        function showDayPrevious(str) {
            if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","planner-day.php?="+str,true);
                xmlhttp.send();
            }

            function showPreviousDay(str) {
                if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("txtHint").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET","planner-day-previous.php?="+str,true);
                    xmlhttp.send();
                }

                function showNextWeek(str) {
                    if (window.XMLHttpRequest) {
                            // code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp = new XMLHttpRequest();
                        } else {
                            // code for IE6, IE5
                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("txtHint").innerHTML = this.responseText;
                            }
                        };
                        xmlhttp.open("GET","planner-next-week.php?="+str,true);
                        xmlhttp.send();
                    }

                    function plannerPreviousWeek(str) {
                        if (window.XMLHttpRequest) {
                                // code for IE7+, Firefox, Chrome, Opera, Safari
                                xmlhttp = new XMLHttpRequest();
                            } else {
                                // code for IE6, IE5
                                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                            }
                            xmlhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    document.getElementById("txtHint").innerHTML = this.responseText;
                                }
                            };
                            xmlhttp.open("GET","planner-week.php?="+str,true);
                            xmlhttp.send();
                        }

                        function showPreviousWeekly(str) {
                            if (window.XMLHttpRequest) {
                                    // code for IE7+, Firefox, Chrome, Opera, Safari
                                    xmlhttp = new XMLHttpRequest();
                                } else {
                                    // code for IE6, IE5
                                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                }
                                xmlhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        document.getElementById("txtHint").innerHTML = this.responseText;
                                    }
                                };
                                xmlhttp.open("GET","previous-weekly.php?="+str,true);
                                xmlhttp.send();
                            }

                            function showNextWeekly(str) {
                                if (window.XMLHttpRequest) {
                                        // code for IE7+, Firefox, Chrome, Opera, Safari
                                        xmlhttp = new XMLHttpRequest();
                                    } else {
                                        // code for IE6, IE5
                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                    }
                                    xmlhttp.onreadystatechange = function() {
                                        if (this.readyState == 4 && this.status == 200) {
                                            document.getElementById("txtHint").innerHTML = this.responseText;
                                        }
                                    };
                                    xmlhttp.open("GET","planner-week.php?="+str,true);
                                    xmlhttp.send();
                                }
