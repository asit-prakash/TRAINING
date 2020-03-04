//USING JQUERY
/*$(document).ready(function()
    {
        //increase height of div
        $(".section1:last").click(function()
        {
            $(".section1 .height").css({"height": "300px"});
        });
        //move div to right
        $(".section2 button").click(function()
        {
            $(".section2 .height").animate({ marginLeft: 400 }, 'slow');
        });
        //fix header after scroll
        $(window).scroll(function()
        {
            if ($(window).scrollTop() >= 700 && $(window).scrollTop() <= 900) 
            {
                $(".full").css({"position": "fixed","top": "0","width": "100%"});
            }  
            else
            {
                $(".full").css({"position": "static"});
            }
        });
        //wrap a div inside othe div
        $(".section5 button").click(function()
        {
            $("p:nth-child(3)").wrap("<div class='wrapped'></div>");
        });
        //change value of input and disable it
        $(".section9 button").click(function()
        {
            $("#test3").val("it worked");
            $("#test3").attr('disabled','disabled');
        });
        //change color of p which don't have class
        $(".section6 button").click(function()
        {
            $("p").not(".intro").css({"background-color":"blue"});
        });
        //change bg color of 4,5,6 div
        $(".section7 button").click(function()
        {
            $(".section7 li:lt(6):gt(2)").css({"background-color":"red"});
        });
        //change border color of all div except 1
        $(".section8 button").click(function()
        {
            $(".section8 li:gt(0)").css({"border-color":"red"});
        });
        //change content of tabs
        $(".tabcontent :eq(0)").click(function()
        {
            $(".content").css({"display":"none"});
            $(".active").css({"display":"block"});
        });
        $(".tabcontent :eq(1)").click(function()
        {
            $(".content").css({"display":"block"});
            $(".active").css({"display":"none"});
        });
        //scroll back to top
        $('.section10 button').click(function()
        { 
            $("html").animate({ scrollTop: 0 }, 1500);  
        }); 
    });*/

//USING JAVASCRIPT

    //increase height of div
    document.querySelector('.section1 button').onclick=function()
    {
        document.querySelector('.section1 .height').style.height='300px';
    }

    //move div to right
    document.querySelector('.section2 button').onclick=function()
    {
        var pos = 0;
        function frame() 
        {
          if (pos == 400) 
          {
            clearInterval(id);
          } 
          else 
          {
            pos++; 
            document.querySelector('.section2 div').style.marginLeft=pos + "px";
          }
        }
        var id = setInterval(frame, 5);
    }

    //fix header after scroll
    var header = document.querySelector('.section3');
    var sticky = header.offsetTop;
    window.onscroll = function() 
    {
        if (window.pageYOffset > 700 && window.pageYOffset<=900) 
        {
            document.querySelector('.full').style.top=0;
            document.querySelector('.full').style.width="100%";
            document.querySelector('.full').style.position='fixed';

        } 
        else
        {
            document.querySelector('.full').style.position='static';

        }
    };

    //wrap a div inside othe div
    document.querySelector('.section5 button').onclick=function()
    {
        var el = document.querySelector('.section5 p:nth-child(3)');
        console.log(el);
        var wrapper = document.createElement('div');
        el.parentNode.insertBefore(wrapper, el);
        wrapper.appendChild(el);
    }

    //change value of input and disable it
    document.querySelector('.section9 button').onclick=function()
    {
        var el = document.querySelector('.section9 input:nth-child(2)');
        el.value='it worked';
        el.disabled='disabled';
    }

    //change color of p which don't have class
    document.querySelector('.section6 button').onclick=function()
    {
        var el = document.querySelector('.section6 p:nth-child(5)');
        console.log(el);
        el.style.backgroundColor='blue';
    }

     //change bg color of 4,5,6 div
    document.querySelector('.section7 button').onclick=function()
    {
        var x = document.querySelector('.section7').querySelectorAll('li');
        for (i = 3; i < 6; i++) {
            x[i].style.backgroundColor = "red";
          }
    }

    //change border color of all div except 1
    document.querySelector('.section8 button').onclick=function()
    {
        var x = document.querySelector('.section8').querySelectorAll('li');
        for (i = 1; i < x.length; i++) {
            x[i].style.borderColor = "red";
          }
    }

    //change content of tabs
    var x = document.querySelector('.tabcontent').querySelectorAll('button');
    var con= document.querySelector('.tabcontent').querySelectorAll('.content');
    x[0].onclick=function()
    {
        con[0].style.display="none";
        document.querySelector('.tabcontent .active').style.display="block";
    }
    x[1].onclick=function()
    {
        con[1].style.display="block";
        document.querySelector('.tabcontent .active').style.display="none";
    }

    //scroll back to top
    document.querySelector('.section10 button').onclick=function()
    {
        window.scrollTo({top: 0, behavior: 'smooth'});
    }






