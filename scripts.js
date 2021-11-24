$(function () {


  let currentTab = "homeTab";
  
  /* By default, "not logged in" UI is displayed
  This function checks if cookie exists and modifies UI accordingly */
     var cookiesObj = {};
     function getCookies() {
       var cookies = document.cookie;
       var cookiesArr = cookies.split(";");
   
       for (var i = 0; i < cookiesArr.length; i++) {
         var cookiesKV = cookiesArr[i];
         cookiesKV = cookiesKV.trim();
         var cookiesArr2 = cookiesKV.split("=");
         cookiesObj[cookiesArr2[0]] = cookiesArr2[1];
       }
   
       if (cookiesObj.loggedIn == 1) {
         transitionSignedIn("1");
         let userIdGlobal = cookiesObj.userId
         document.getElementById("hiddU").value = userIdGlobal
         var ush = new XMLHttpRequest();
         ush.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200) {
             let userSecurity = ush.responseText;
             
             document.cookie = "gsh="+this.responseText+"; max-age=999999;"
             $("#hiddenGsh").text(this.responseText)
           
             
             
           }
         };
         ush.open("GET", "purchaseGame.php?cmd=gsh", true);
         ush.send();
         changeUI("membersArea");
       } else {
         transitionSignedIn("0")
       }
     }
   
     getCookies();
   


  // Fetch current featured products
  async function displayFeaturedProducts() {
    let { featuredProducts } = await fetch(
      "featuredProducts.json"
    ).then((res) => res.json());

    featuredProducts.forEach(
      ({ productName, featuredPosition, productID, image }) => {
        $(`#${featuredPosition}`).text(productName);
        let buttonName = featuredPosition + "Button";
        let featuredImage = featuredPosition + "Image";
        let theImage = "images/" + image + ".jpg";

        document.getElementById(buttonName).value = productID;
        document.getElementById(featuredImage).innerHTML =
          '<img class="img-fluid" src="' + theImage + '"></img>';
      }
    );
  }

  displayFeaturedProducts();

  // This function makes navbar stay at top of screen
  let navbar = document.getElementById("nav");
  let offset = navbar.offsetTop;

  window.onscroll = function () {
    fixedNavBar();
  };

  function fixedNavBar() {
    if (window.pageYOffset >= offset) {
      navbar.classList.add("fixednav");
    } else {
      navbar.classList.remove("fixednav");
    }
  }
  let b = window.matchMedia("(max-width: 613px)");
  b.addEventListener("change", setNavBarSize);
  if (b.matches) {
    setNavBarSize(b);
  }

  /**This function alters the menu if screen cannot
   * fit all navbar items in their standard display
   */
  function setNavBarSize(b) {
    if (b.matches) {
      document.getElementById("mobileMenu").style.display = "block";
      document.getElementById("homeButton").style.display = "none";
      document.getElementById("productsButton").style.display = "none";
      document.getElementById("membersButton").style.display = "none";
      document.getElementById("logoutButton").style.display = "none"
      document.getElementById("aboutUsButton").style.display = "none";
      document.getElementById("contactUsButton").style.display = "none";
      getCookies()
    } else {
      document.getElementById("mobileMenu").style.display = "none";
      document.getElementById("membersDiv").style.display = "flex";
     
      document.getElementById("homeButton").style.display = "block";
      document.getElementById("productsButton").style.display = "block";
      document.getElementById("aboutUsButton").style.display = "block";
      document.getElementById("contactUsButton").style.display = "block";
      getCookies()
    }
  }

  $("#modifyCredForm").submit(function () {
    var form = $(this);
    var formData = form.serialize();
    var formUrl = form.attr("action");
    var formMethod = form.attr("method");

    $.ajax({
      url: formUrl,
      type: formMethod,
      data: formData,
      success: function (data) {
        window.location.reload();
      },
    });
    return false;
  });
  function changeUI(mode) {
    document.getElementById(currentTab).style.display = "none";
    switch (mode) {
      case "homeTab":
        currentTab = "homeTab";
        break;
      case "nintendoTab":
        currentTab = "nintendoTab";
        break;
      case "playStationTab":
        currentTab = "playStationTab";
        break;
      case "xboxTab":
        currentTab = "xboxTab";
        break;
      case "aboutUsTab":
        currentTab = "aboutUsTab";
        break;
      case "contactTab":
        currentTab = "contactTab";
        break;
      case "viewAllProducts":
        currentTab = "allProducts";
        break;
      case "membersArea":
        currentTab = "membersArea";
        break;
    }

    document.getElementById(currentTab).style.display = "block";
  }

   /** Value 1 : Switch UI to signed in
    * Value 2 : Switch UI to signed out
    */
  function transitionSignedIn(value) {
    switch(value) {
      case "0":
         //not logged in
        document.getElementById("loginSignUp").style.display = "flex";
        document.getElementById("logoutButton").style.display = "none";
        document.getElementById("membersButton").style.display = "none";
        document.getElementById("mobileYourGames").style.display = "none";
        document.getElementById("mobileLogout").style.display = "none";
        //document.getElementById("membersDiv").style.display = "none";
        
      break;
      case "1":
        //logged in
      //  document.getElementById("membersDiv").style.display = "block";
        document.getElementById("logoutButton").style.display = "flex";
        document.getElementById("membersButton").style.display = "flex";
        document.getElementById("loginSignUp").style.display = "none";
        document.getElementById("mobileLogin").style.display = "none";
        document.getElementById("mobileSignUp").style.display = "none";
        document.g
        break;
    }
    
  }

  $("#downloadClose").on("click", function() {
    $("#downloadModal").modal("hide");
  })
  function openDownload(id, name) {
   // $("#downloadButton").val(document.getElementById("downloadButton").getAttribute("value");
   
    $("#downloadTitle").text("Download "+name)
    $("#downloadText").text("Click the button below to download " + name)
    $("#downloadModal").modal("show")
  }
  /*** BUTTONS  */

  $(".openGame").on("click", function() {
    let id =  this.getAttribute('data-value')
    document.getElementById("downloadButton").value = this.getAttribute('data-value')
   // $("#downloadButton").val(this.getAttribute('data-value'));
    let name = this.getAttribute('data-name')
  
    openDownload(id, name)
  })
  $("#downloadButton").on("click", function() {
     // let id = this.getAttribute('data-id')
     var dl = new XMLHttpRequest();
     dl.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
      
        var link = document.createElement("a");
        link.download = this.responseText+".exe";
        link.href = "https://defunctive-coxswain.000webhostapp.com/test.php";
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        delete link;
       }
     };
     dl.open("GET", "https://defunctive-coxswain.000webhostapp.com/purchaseGame.php?cmd=getName&itemId="+$("#downloadButton").val(), true);
     dl.send();
    /* var link = document.createElement("a");
     link.download = $("#downloadButton").val()+".exe";
     link.href = "https://defunctive-coxswain.000webhostapp.com/test.php";
     document.body.appendChild(link);
     link.click();
     document.body.removeChild(link);
     delete link;*/
      //window.alert($("#downloadButton").val())
  })

  $("#homeButton").on("click", function () {
    changeUI("homeTab");
  });

  $("#nintendoButton").on("click", function () {
    changeUI("nintendoTab");
  });

  $("#aboutUsButton").on("click", function () {
    changeUI("aboutUsTab");
  });

  $("#playStationButton").on("click", function () {
    changeUI("playStationTab");
  });

  $("#xboxButton").on("click", function () {
    changeUI("xboxTab");
  });

  $("#buyNowButton").on("click", function() {
    let itemId = this.value
    $("#authenticateStatus").text("");
    $("#moreInfoModal").modal("hide");
    $("#buyNowModal").modal("show");
    document.getElementById("yesSure").value = this.value;
    var getName = new XMLHttpRequest();
    getName.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
    //

    let gameName = this.responseText
    var getPrice = new XMLHttpRequest();
    getPrice.onreadystatechange = function() {
      if (getPrice.readyState == 4 && getPrice.status == 200) {
    //
    let gamePrice = getPrice.responseText
    $("#areYouSure").html("Are you sure you want to buy " + gameName + "?<br>The price of this game is " + gamePrice);
      }
    };
    getPrice.open("GET", "purchaseGame.php?cmd=getPrice&itemId="+itemId, true);
    getPrice.send();
   // $("#areYouSure").html("Are you sure you want to buy " + gameName + "?<br>The price of this game is " + gamePrice);
      }
    };
    getName.open("GET", "purchaseGame.php?cmd=getName&itemId="+itemId, true);
    getName.send();


  });


$("#loginExisting").on("click", function() {
  $("#pleaseLogin").modal("hide");
  $("#loginModal").modal("show");

})

$("#createNewAcct").on("click", function() {
  $("#pleaseLogin").modal("hide");
  $("#signUpModal").modal("show");
})

  $("#yesSure").on("click", function() {
    document.getElementById("confirmPwBuy").value = this.value
    $("#buyNowModal").modal("hide");


   /*
    document.getElementById("yesSure").style.display = "none";
    $("#yesSureClose").html("Close")
    $("#yesSureClose").removeClass("btn-danger")
    $("#yesSureClose").addClass("btn-primary")
    */

    var chkLg = new XMLHttpRequest();
    chkLg.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       if(this.responseText == "true") {
         $("#confirmBuy").modal("show")
       }
       else
       {
         $("#pleaseLogin").modal("show")
       }
      }
    };
    chkLg.open("GET", "purchaseGame.php?cmd=checkLoggedIn", true);
    chkLg.send();
   
/*
   //$("#buyCallbackModal").modal("show");
    var securityHash = new XMLHttpRequest();
    securityHash.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("areYouSure").innerHTML = this.responseText;
      }
    };
    securityHash.open("GET", "purchaseGame.php?cmd=gsh", true);
    securityHash.send();
    let gshResp = securityHash.responseText;
  

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("buyCallbackMsg").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "purchaseGame.php?cmd=doPurchase&itemId=" + this.value + "&ush=" + gshResp, true);
    xmlhttp.send();
    response = xmlhttp.responseText;
*/
   
  })

  $("#addCreds").on("click", function(){
    $("#creditsModal").modal("show");
  })

  $("#contactUsButton").on("click", function () {
    $("#contactModal").modal("show");
  });
  $("#afterClose").on("click", function() {
    $("#afterBuy").modal("hide");
  })
  
  $("#confirmPwBuy").submit(function () {
    $("#authenticateStatus").text("");
    var ush = new XMLHttpRequest();
    ush.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        let userSecurity = ush.responseText;
        document.getElementById("hiddenGsh").value = userSecurity
        //ush READY!!!

        
      }
    };
    ush.open("GET", "purchaseGame.php?cmd=gsh", true);
    ush.send();
    
    let itemId = this.value;

    var getU = new XMLHttpRequest();
    getU.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("areYouSure").innerHTML = this.responseText;
      }
    };
    getU.open("GET", "purchaseGame.php?cmd=getUser", true);
    getU.send();
    let userId = getU.responseText;


 
    var form = $(this);
    var formData = form.serialize();
    var formUrl = "purchaseGame.php?cmd=confirmBuy" + userId
    var formMethod = form.attr("method");
    response = $("#buyGameResponse");

    $.ajax({
      url: formUrl,
      type: formMethod,
      data: formData,
      success: function (data) {
        var responseData = data;

        switch (data) {
          case "invalid":
            document.getElementById("passwordBuy").value = "";
            $("#authenticateStatus").addClass("responseFailure").text("The password you entered was incorrect. Please try again.")
            break;
          case "valid":
            var doBuy = new XMLHttpRequest();
            doBuy.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
              document.getElementById("passwordBuy").value = "";
             
              $("#confirmBuy").modal("hide");
              $("#afterBuy").modal("show");
              var responseObj = JSON.parse(this.responseText)
              if(responseObj.response == "failure") {
                $("#afterTitle").text("Error");
              $("#afterMessage").removeClass("responseSuccess").addClass("responseFailure").text(responseObj.data);
                   }
                  
                if(responseObj.response == "success") {
                  var newList = new XMLHttpRequest();
                  newList.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                      //document.getElementById("areYouSure").innerHTML = this.responseText;
                      var responseStr = this.responseText.toString();
                      document.getElementById("gamesList").innerHTML = responseStr;
                    }
                  };
                  let uid = document.getElementById("hiddU").value;
                  newList.open("GET", "purchaseGame.php?cmd=gamesList&userId="+uid, true);
                  newList.send();
                  
                  $("#afterTitle").text("Success");
                  $("#refreshGames").val(1)
                  $("#afterMessage").removeClass("responseFailure").addClass("responseSuccess").text(responseObj.data);
                }
                  }
                };
        let userSec = document.getElementById("hiddenGsh").value;
        doBuy.open("GET", "purchaseGame.php?cmd=doPurchase&itemId="+itemId+"&ush="+userSec, true);
        doBuy.send();

           
             
            break;
        }
      },
    });
    return false;
  });


  $("#submitContact").on("click", function () {
    $("#contactModal").modal("hide");

    let name = $("#thename").val();
    $("#contactedName").html(
      "Thank you for contacting us, " +
        name +
        ".<br>We have received your message and we will get back to you soon."
    );
    $("#contactSubmittedModal").modal("show");
  });

  $("#viewAllProducts").on("click", function () {
    changeUI("viewAllProducts");
  });

  $("#contactInAbout").on("click", function () {
    $("#contactModal").modal("show");
  });

  $("#closeContacted").on("click", function () {
    $("#contactSubmittedModal").modal("hide");
  });

  $(".moreinfo").on("click", function () {
    let productId = this.value;
    showMoreInfo(productId);
    $("#buyNowButton").val(this.value);

  });

  $("#mobileHome").on("click", function () {
    changeUI("homeTab");
  });

  $("#mobileContact").on("click", function () {
    $("#contactModal").modal("show");
  });

  $("#logoutButton").on("click", function () {
    transitionSignedIn("0");
    document.cookie = "loggedIn=0; max-age=999999;"
    document.cookie = "username=null; max-age=999999;"
    document.cookie = "userId=null; max-age=999999;"

    changeUI("homeTab");
  });

  $("#mobileAbout").on("click", function () {
    changeUI("aboutUsTab");
  });

  $("#mobileNintendo").on("click", function () {
    changeUI("nintendoTab");
  });
  $("#mobilePlayStation").on("click", function () {
    changeUI("playStationTab");
  });
  $("#mobileXbox").on("click", function () {
    changeUI("xboxTab");
  });

  $("#contactForm").submit(function () {
    return;
  });
  
  $("#signUpButton").on("click", function () {
    $("#signUpModal").modal("show");
  });

  $("#loginButton").on("click", function () {
    $("#loginModal").modal("show");
  });

  $("#membersButton").on("click", function() {
    if($("#refreshGames").val() == 1) {
      window.location.reload() 
    }
    else
    {
    changeUI("membersArea");
    }
  })

  $("#mobileYourGames").on("click", function() {
    changeUI("membersArea");
  })

    /** AJAX validation for login form **/

    $("#loginForm").submit(function () {
      var form = $(this);
      var formData = form.serialize();
      var formUrl = form.attr("action");
      var formMethod = form.attr("method");
      response = $("#loginResponse");
  
      $.ajax({
        url: formUrl,
        type: formMethod,
        data: formData,
        success: function (data) {
          var responseData = jQuery.parseJSON(data);
          var cssClass = "";
  
          switch (responseData.status) {
            case "error":
              response.addClass("responseFailure").text(responseData.message);
              break;
            case "success":
              
              document.cookie = 'loggedIn=1; max-age=999999;'
              document.cookie = 'username=' + responseData.username + '; max-age=999999;'
              document.cookie = 'userId=' + responseData.user_id + '; max-age=999999;'
              window.location.reload()
              //changeUI("membersArea");
              response
                .removeClass("responseFailure")
                .addClass("responseSuccess")
                .text("Loading...");
        
              $("#yourLibrary").text(responseData.username + "'s Library");
               
              break;
          }
        },
      });
      return false;
    });

    $("#loginForm").submit(function () {
      var form = $(this);
      var formData = form.serialize();
      var formUrl = form.attr("action");
      var formMethod = form.attr("method");
      response = $("#loginResponse");
  
      $.ajax({
        url: formUrl,
        type: formMethod,
        data: formData,
        success: function (data) {
          var responseData = jQuery.parseJSON(data);
          var cssClass = "";
  
          switch (responseData.status) {
            case "error":
              response.addClass("responseFailure").text(responseData.message);
              break;
            case "success":
              
              document.cookie = 'loggedIn=1; max-age=999999;'
              document.cookie = 'username=' + responseData.username + '; max-age=999999;'
              document.cookie = 'userId=' + responseData.user_id + '; max-age=999999;'
              window.location.reload()
              //changeUI("membersArea");
              response
                .removeClass("responseFailure")
                .addClass("responseSuccess")
                .text("Loading...");
        
              $("#yourLibrary").text(responseData.username + "'s Library");
               
              break;
          }
        },
      });
      return false;
    });
    /** AJAX Validation for sign up form */
    $("#signUpForm").submit(function () {

      var form = $(this);
      var formData = form.serialize();
      var formUrl = form.attr("action");
      var formMethod = form.attr("method");
  
      response = $("#signUpResponse");
      response
        .hide()
        .addClass("responseWaiting")
        .text("Attempting login...")
        .fadeIn(400);
  
      $.ajax({
        url: formUrl,
        type: formMethod,
        data: formData,
        success: function (data) {
          var responseData = jQuery.parseJSON(data);
          var cssClass = "";
  
          switch (responseData.status) {
            case "error":
              cssClass = "responseFailure";
  
              response
                .hide()
                .removeClass("responseWaiting")
                .addClass("responseFailure")
                .text(responseData.message)
                .fadeIn(400);
              break;
            case "success":
              changeUI("membersArea");
              document.getElementById("username").value = "";
              document.getElementById("email").value = "";
              document.getElementById("signUpPw").value = "";
              document.getElementById("signUpConfirmPw").value = "";
              transitionSignedIn("1");
              cssClass = "responseSuccess";

              response.hide();
              $("#signUpModal").modal("hide");
  
              document.cookie = "username=" + responseData.username + "; max-age=999999;"
              document.cookie = "loggedIn=1; max-age=999999;";
              document.cookie = 'userId=' + responseData.user_id + '; max-age=999999;'
          
              var cookies = document.cookie;
              var cookiesArr = cookies.split(";");
              for (var i = 0; i < cookiesArr.length; i++) {
                var cookiesKV = cookiesArr[i];
                cookiesKV = cookiesKV.trim();
                var cookiesArr2 = cookiesKV.split("=");
                cookiesObj[cookiesArr2[0]] = cookiesArr2[1];
              }
              
              $("#accountCreatedSuccessModal").modal("show");
              $("#createdUsername").html(
                "Your account has been created successfully. <br>Thanks for joining, " +
                  cookiesObj.username +
                  "!"
              );
              $("#membersWelcome").html(
                '<h1 class="display-4">Welcome, ' + cookiesObj.username + "!</h1>"
              );

              $("#yourLibrary").text(responseData.username + "'s Library");
              window.location.reload()
              break;
          }
        },
      });
  
      return false;
    });


  async function showMoreInfo(productId) {
    let productsJSON = await fetch("items.json").then((res) => res.json());

    let productObj = productsJSON.products[productId - 1];
    let productName = productObj.productName;
    let system = productObj.system;
    let price = productObj.price;
    let image = "images/" + productObj.image + ".jpg";

    $("#mtitle").text(productName);
    $("#mbody").html(
      "<b>Price: " +
        price +
        "<br>" +
        "System: " +
        system +
        '</b><br><center><img width="200px" height="auto" src="' +
        image +
        '"' +
        "</img></center>"
    );
    $("#moreInfoModal").modal("show");
  }

});
