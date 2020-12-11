<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="cssp/seat.css">

    <style>
        
    </style>

    <title>Ticket Booking</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="navbar-brand" href="HomePage.php"><span><img src="img/logo2-nav.png" height="24px"></span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="book.php">Booking</a>
    </li>
  </ul>
   <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="mybookings.php"><i class="fa fa-ticket" aria-hidden="true"></i>&nbsp;&nbsp;My Bookings</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;Logout</a>
    </li>
  </ul>
</nav>
    <div class="container-fluid" style="margin-top:80px">
        <div class="shadow p-3 mb-5 bg-white rounded" ; style="font-size: larger;font-weight: 900;font-family: 'Courier New', Courier, monospace;">
            <p style="margin-left: 37%;">Please book tickets over here</p>
        </div>
        <!-- <form id="booking-detail" action="seat2.php" method="POST" onsubmit=alert()> -->
        <form action="upload.php" id="booking-detail" method="POST">
        <input type="text" hidden name="counter" value="0" id="hidden-counter" />
        <input type="text" hidden name="total" value="0" id="hidden-counter2" />
        <input type="text" hidden name="selected-seats" value="0" id="hidden-counter3" />
            <div class="card" style="width: 1400px;">
                <div class="card-body">
                    <div class="demo">
                        <div id="seat-map" style="margin-left: 300px;">
                            <div class="front">SCREEN</div>
                        </div>
                        <div class="booking-details" style="margin-right:450px ;margin-top: 30px;">
                            <div id="legend"></div>
                            <div class="booking-details">
                                <?php
                                session_start();
                            $email=$_SESSION['username'];
                            $movname=$_SESSION['movname'];
                            $db = mysqli_connect('localhost','root','','book') or 
                                die('Error connecting to MySQL server.');
                            $query = "SELECT * FROM details WHERE email='$email' and movname='$movname'"; 

                            $result = mysqli_query($db, $query);
                            while ($row = mysqli_fetch_array($result)){
                                $movn=$row['movname'];
                                echo "<p>Movie: <span>".$row['movname']."</span></p>";
                                echo "<p>Date: <span>".$row['movdate']."</span></p>";
                                echo "<p>Time: <span>".$row['movtime']."</span></p>";
                                echo "<br>";
                            }
                                ?>
                            <p>Seat: </p>
                            <ul id="selected-seats"></ul>
                            <p>Tickets: <span id="counter">0</input>
                            </p>
                            <p>Total: <b>Rs.<span id="total">0</span></b></p>
                            <!-- <button type='submit' id='submit' onclick="submitForm">Buy</button> -->
                            <button type='submit' id='submit'>Buy</button>

                        </div>
                        <div style="clear:both"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script> 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
    
        /*!
         * jQuery-Seat-Charts v1.1.5
         * https://github.com/mateuszmarkowski/jQuery-Seat-Charts
         *
         * Copyright 2013, 2016 Mateusz Markowski
         * Released under the MIT license
         */

        ! function(t) {
            t.fn.seatCharts = function(s) {
                if (this.data("seatCharts")) return this.data("seatCharts");
                var e = this,
                    a = {},
                    n = [],
                    i = {
                        animate: !1,
                        naming: {
                            top: !0,
                            left: !0,
                            getId: function(t, s, e) {
                                return s + "_" + e
                            },
                            getLabel: function(t, s, e) {
                                return e
                            }
                        },
                        legend: {
                            node: null,
                            items: []
                        },
                        click: function() {
                            return "available" == this.status() ? "selected" : "selected" == this.status() ? "available" : this.style()
                        },
                        focus: function() {
                            return "available" == this.status() ? "focused" : this.style()
                        },
                        blur: function() {
                            return this.status()
                        },
                        seats: {}
                    },
                    r = function(s, e) {
                        return function(n) {
                            var i = this;
                            i.settings = t.extend({
                                    status: "available",
                                    style: "available",
                                    data: e.seats[n.character] || {}
                                }, n), i.settings.$node = t("<div></div>"), i.settings.$node.attr({
                                    id: i.settings.id,
                                    role: "checkbox",
                                    "aria-checked": !1,
                                    focusable: !0,
                                    tabIndex: -1
                                }).text(i.settings.label).addClass(["seatCharts-seat", "seatCharts-cell", "available"].concat(i.settings.classes, "undefined" == typeof e.seats[i.settings.character] ? [] : e.seats[i.settings.character].classes).join(" ")), i.data = function() {
                                    return i.settings.data
                                }, i["char"] = function() {
                                    return i.settings.character
                                }, i.node = function() {
                                    return i.settings.$node
                                }, i.style = function() {
                                    return 1 == arguments.length ? function(t) {
                                        var s = i.settings.style;
                                        return t == s ? s : (i.settings.status = "focused" != t ? t : i.settings.status, i.settings.$node.attr("aria-checked", "selected" == t), e.animate ? i.settings.$node.switchClass(s, t, 200) : i.settings.$node.removeClass(s).addClass(t), i.settings.style = t)
                                    }(arguments[0]) : i.settings.style
                                }, i.status = function() {
                                    return i.settings.status = 1 == arguments.length ? i.style(arguments[0]) : i.settings.status
                                },
                                function(n, r, c) {
                                    t.each(["click", "focus", "blur"], function(t, u) {
                                        i[u] = function() {
                                            return "focus" == u && (void 0 !== s.attr("aria-activedescendant") && a[s.attr("aria-activedescendant")].blur(), s.attr("aria-activedescendant", c.settings.id), c.node().focus()), i.style("function" == typeof n[r][u] ? n[r][u].apply(c) : e[u].apply(c))
                                        }
                                    })
                                }(e.seats, i.settings.character, i), i.node().on("click", i.click).on("mouseenter", i.focus).on("mouseleave", i.blur).on("keydown", function(t, e) {
                                    return function(n) {
                                        var i;
                                        switch (n.which) {
                                            case 32:
                                                n.preventDefault(), t.click();
                                                break;
                                            case 40:
                                            case 38:
                                                if (n.preventDefault(), i = function r(t, s, a) {
                                                        var c;
                                                        return c = t.index(a) || 38 != n.which ? t.index(a) == t.length - 1 && 40 == n.which ? t.first() : t.eq(t.index(a) + (38 == n.which ? -1 : 1)) : t.last(), i = c.find(".seatCharts-seat,.seatCharts-space").eq(s.index(e)), i.hasClass("seatCharts-space") ? r(t, s, c) : i
                                                    }(e.parents(".seatCharts-container").find(".seatCharts-row:not(.seatCharts-header)"), e.parents(".seatCharts-row:first").find(".seatCharts-seat,.seatCharts-space"), e.parents(".seatCharts-row:not(.seatCharts-header)")), !i.length) return;
                                                t.blur(), a[i.attr("id")].focus(), i.focus(), s.attr("aria-activedescendant", i.attr("id"));
                                                break;
                                            case 37:
                                            case 39:
                                                if (n.preventDefault(), i = function(t) {
                                                        return t.index(e) || 37 != n.which ? t.index(e) == t.length - 1 && 39 == n.which ? t.first() : t.eq(t.index(e) + (37 == n.which ? -1 : 1)) : t.last()
                                                    }(e.parents(".seatCharts-container:first").find(".seatCharts-seat:not(.seatCharts-space)")), !i.length) return;
                                                t.blur(), a[i.attr("id")].focus(), i.focus(), s.attr("aria-activedescendant", i.attr("id"))
                                        }
                                    }
                                }(i, i.node()))
                        }
                    }(e, i);
                if (e.addClass("seatCharts-container"), t.extend(!0, i, s), i.naming.rows = i.naming.rows || function(t) {
                        for (var s = [], e = 1; t >= e; e++) s.push(e);
                        return s
                    }(i.map.length), i.naming.columns = i.naming.columns || function(t) {
                        for (var s = [], e = 1; t >= e; e++) s.push(e);
                        return s
                    }(i.map[0].split("").length), i.naming.top) {
                    var c = t("<div></div>").addClass("seatCharts-row seatCharts-header");
                    i.naming.left && c.append(t("<div></div>").addClass("seatCharts-cell")), t.each(i.naming.columns, function(s, e) {
                        c.append(t("<div></div>").addClass("seatCharts-cell").text(e))
                    })
                }
                return e.append(c), t.each(i.map, function(s, c) {
                    var u = t("<div></div>").addClass("seatCharts-row");
                    i.naming.left && u.append(t("<div></div>").addClass("seatCharts-cell seatCharts-space").text(i.naming.rows[s])), t.each(c.match(/[a-z_]{1}(\[[0-9a-z_]{0,}(,[0-9a-z_ ]+)?\])?/gi), function(e, c) {
                        var h = c.match(/([a-z_]{1})(\[([0-9a-z_ ,]+)\])?/i),
                            d = h[1],
                            o = "undefined" != typeof h[3] ? h[3].split(",") : [],
                            l = o.length ? o[0] : null,
                            f = 2 === o.length ? o[1] : null;
                        u.append("_" != d ? function(t) {
                            i.seats[d] = d in i.seats ? i.seats[d] : {};
                            var c = l ? l : t.getId(d, t.rows[s], t.columns[e]);
                            return a[c] = new r({
                                id: c,
                                label: f ? f : t.getLabel(d, t.rows[s], t.columns[e]),
                                row: s,
                                column: e,
                                character: d
                            }), n.push(c), a[c].node()
                        }(i.naming) : t("<div></div>").addClass("seatCharts-cell seatCharts-space"))
                    }), e.append(u)
                }), i.legend.items.length ? function(s) {
                    var a = (s.node || t("<div></div>").insertAfter(e)).addClass("seatCharts-legend"),
                        n = t("<ul></ul>").addClass("seatCharts-legendList").appendTo(a);
                    return t.each(s.items, function(s, e) {
                        n.append(t("<li></li>").addClass("seatCharts-legendItem").append(t("<div></div>").addClass(["seatCharts-seat", "seatCharts-cell", e[1]].concat(i.classes, "undefined" == typeof i.seats[e[0]] ? [] : i.seats[e[0]].classes).join(" "))).append(t("<span></span>").addClass("seatCharts-legendDescription").text(e[2])))
                    }), a
                }(i.legend) : null, e.attr({
                    tabIndex: 0
                }), e.focus(function() {
                    e.attr("aria-activedescendant") && a[e.attr("aria-activedescendant")].blur(), e.find(".seatCharts-seat:not(.seatCharts-space):first").focus(), a[n[0]].focus()
                }), e.data("seatCharts", {
                    seats: a,
                    seatIds: n,
                    status: function() {
                        var s = this;
                        return 1 == arguments.length ? s.seats[arguments[0]].status() : function(e, a) {
                            return "string" == typeof e ? s.seats[e].status(a) : function() {
                                t.each(e, function(t, e) {
                                    s.seats[e].status(a)
                                })
                            }()
                        }(arguments[0], arguments[1])
                    },
                    each: function(t) {
                        var s = this;
                        for (var e in s.seats)
                            if (!1 === t.call(s.seats[e], e)) return e;
                        return !0
                    },
                    node: function() {
                        var s = this;
                        return t("#" + s.seatIds.join(",#"))
                    },
                    find: function(t) {
                        var s = this,
                            e = s.set();
                        return t instanceof RegExp ? function() {
                            return s.each(function(s) {
                                s.match(t) && e.push(s, this)
                            }), e
                        }() : 1 == t.length ? function(t) {
                            return s.each(function() {
                                this["char"]() == t && e.push(this.settings.id, this)
                            }), e
                        }(t) : function() {
                            return t.indexOf(".") > -1 ? function() {
                                var a = t.split(".");
                                return s.each(function(t) {
                                    this["char"]() == a[0] && this.status() == a[1] && e.push(this.settings.id, this)
                                }), e
                            }() : function() {
                                return s.each(function() {
                                    this.status() == t && e.push(this.settings.id, this)
                                }), e
                            }()
                        }()
                    },
                    set: function u() {
                        var s = this;
                        return {
                            seats: [],
                            seatIds: [],
                            length: 0,
                            status: function() {
                                var s = arguments,
                                    e = this;
                                return 1 == this.length && 0 == s.length ? this.seats[0].status() : function() {
                                    t.each(e.seats, function() {
                                        this.status.apply(this, s)
                                    })
                                }()
                            },
                            node: function() {
                                return s.node.call(this)
                            },
                            each: function() {
                                return s.each.call(this, arguments[0])
                            },
                            get: function() {
                                return s.get.call(this, arguments[0])
                            },
                            find: function() {
                                return s.find.call(this, arguments[0])
                            },
                            set: function() {
                                return u.call(s)
                            },
                            push: function(t, s) {
                                this.seats.push(s), this.seatIds.push(t), ++this.length
                            }
                        }
                    },
                    get: function(s) {
                        var e = this;
                        return "string" == typeof s ? e.seats[s] : function() {
                            var a = e.set();
                            return t.each(s, function(t, s) {
                                "object" == typeof e.seats[s] && a.push(s, e.seats[s])
                            }), a
                        }()
                    }
                }), e.data("seatCharts")
            }
        }(jQuery);
    </script>
    <script>
    
        var price = 200; //price
        $(document).ready(function() {
            var $cart = $('#selected-seats'), //Sitting Area
                $counter = $('#counter'), //Votes
                $total = $('#total'); //Total money

            var sc = $('#seat-map').seatCharts({
                map: [ //Seating chart
                    'aaaaaaaaaa',
                    'aaaaaaaaaa',
                    '__________',
                    'aaaaaaaaaa',
                    'aaaaaaaaaa',
                    'aaaaaaaaaa',
                    'aaaaaaaaaa',
                    'aaaaaaaaaa',
                    'aaaaaaaaaa',
                    'aa__aa__aa'
                ],
                naming: {
                    top: false,
                    getLabel: function(character, row, column) {
                        return column;
                    }
                },
                legend: { //Definition legend
                    node: $('#legend'),
                    items: [
                        ['a', 'available', 'Option'],
                        ['a', 'unavailable', 'Sold']
                    ]
                },
                click: function() { //Click event
                    if (this.status() == 'available') { //optional seat
                        $('<li>R' + (this.settings.row + 1) + ' S' + this.settings.label + '</li>')
                            .attr('id', 'cart-item-' + this.settings.id)
                            .data('seatId', this.settings.id)
                            .appendTo($cart);

                        $counter.text(sc.find('selected').length + 1);
                        $total.text(recalculateTotal(sc) + price);

                        $("#hidden-counter").val($counter.text());
                        $("#hidden-counter2").val($total.text());
                        $("#hidden-counter3").val($cart.text());
                        

                        return 'selected';
                    } else if (this.status() == 'selected') { //Checked
                        //Update Number
                        $counter.text(sc.find('selected').length - 1);
                        //update totalnum
                        $total.text(recalculateTotal(sc) - price);

                        //Delete reservation
                        $('#cart-item-' + this.settings.id).remove();
                        //optional
                        return 'available';
                    } else if (this.status() == 'unavailable') { //sold
                        return 'unavailable';
                    } else {
                        return this.style();
                    }
                }
            });
            //sold seat
            sc.get(['1_2', '4_4', '4_5', '6_6', '6_7', '8_5', '8_6', '8_7', '8_8', '10_1', '10_2']).status('unavailable');

        });
        //sum total money
        function recalculateTotal(sc) {
            var total = 0;
            sc.find('selected').each(function() {
                total += price;
            });

            return total;
        }

        
        // function submitForm() {
        //     alert($('#hidden-counter').innerHTML());
        // }
        
        

         $('#booking-detail').on("submit", function (event) {
            //  event.preventDefault();
            //  meet disconnect hua refresh and see console op
             console.log($("#hidden-counter").val());
             console.log($("#hidden-counter2").val());
             console.log($("#hidden-counter3").val());
         });
             //  $('#booking-detail').on("submit", function (event) {
        //     console.log('hey submit');
        //     var dets = [];
        //     var $cart = $('#selected-seats'), //Sitting Area
        //         $counter = $('#counter'), //Votes
        //         $total = $('#total');
        //         dets.push($cart.text());
        //         dets.push($counter.text());
        //         dets.push($total.text());
        //         /* var myForm = document.getElementById('booking-detail');
        //         var formData = new FormData(myForm); */
        //         // console.log(dets); 
        // //         $.ajax({
        // //             // async 
        // //     method: "POST",
        // //     enctype: 'multipart/form-data',
        // //     url: "upload.php",
        // //     data: {dets: JSON.stringify(dets)} ,
        // //     success: function (data) {

        // //         $("#output").text(data);
        // //         console.log("SUCCESS : ", data);
        // //         $("#btnSubmit").prop("disabled", false);
 
        // //     },
        // //     error: function (e) {
 
        // //         $("#output").text(e.responseText);
        // //         console.log("ERROR : ", e);
        // //         $("#btnSubmit").prop("disabled", false);
 
        // //     }
        // // })

        // }); 

        
    </script>
    
</body>

</html>