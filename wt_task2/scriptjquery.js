$(document).ready(function () {

    // 🔹 SELECTORS
    $("#btnSelectors").click(function () {
        $("#idSel").css("color", "red");                 // ID
        $(".classSel").css("font-weight", "bold");       // Class
        $("ul li:first").css("background", "yellow");    // Filter
        $("ul li:even").css("color", "green");
        $("ul li:not(:first)").css("font-style", "italic");
    });

    // 🔹 ATTRIBUTES
    $("#btnAttr").click(function () {
        $("#img").attr("src", "https://via.placeholder.com/150"); // attr
        $("#img").removeAttr("alt"); // removeAttr
        $("#check").prop("checked", true); // prop
        alert($("#inputVal").val()); // val
    });

    // 🔹 EVENTS

    // Mouse events
    $("#btnClick").click(() => alert("Clicked"));
    $("#btnDbl").dblclick(() => alert("Double Click"));

    $(".box").mouseenter(() => console.log("Mouse Enter"));
    $(".box").mouseleave(() => console.log("Mouse Leave"));

    $(".box").mousedown(() => console.log("Mouse Down"));
    $(".box").mouseup(() => console.log("Mouse Up"));

    $(".box").hover(
        () => console.log("Hover In"),
        () => console.log("Hover Out")
    );

    // Keyboard events
    $("#keyInput").keypress(() => console.log("Key Press"));
    $("#keyInput").keydown(() => console.log("Key Down"));
    $("#keyInput").keyup(() => console.log("Key Up"));

    // Form events
    $("#name").focus(function () {
        $(this).css("background", "lightblue");
    });

    $("#name").blur(function () {
        $(this).css("background", "white");
    });

    $("#name").change(() => console.log("Changed"));

    $("#form").submit(function (e) {
        e.preventDefault();
        alert("Form Submitted");
    });

    // on / off
    $("#btnClick").on("mouseenter", function () {
        $(this).css("background", "yellow");
    });

    $("#btnClick").off("mouseenter");

    // 🔹 STYLE
    $("#btnStyle").click(function () {
        $("#styleText").css("color", "blue");     // css
        $("#styleText").addClass("highlight");    // addClass
        $("#styleText").toggleClass("red");       // toggleClass

        if ($("#styleText").hasClass("red")) {
            console.log("Has red class");
        }

        $("#styleText").removeClass("highlight"); // removeClass
    });

    // 🔹 TRAVERSING
    $("#btnTraverse").click(function () {

        $(".special").parent().css("border", "2px solid red"); // parent
        $(".special").parents().css("background", "#eee");     // parents

        $(".special").children(); // (no children but included)

        $("#parent").find(".child").css("color", "blue"); // find

        $(".special").siblings().css("color", "green"); // siblings

        $(".special").next().css("font-size", "20px"); // next
        $(".special").prev().css("font-size", "18px"); // prev

        $(".child").first().css("background", "yellow"); // first
        $(".child").last().css("background", "pink");    // last
        $(".child").eq(1).css("border", "2px solid black"); // eq

        $(".child").filter(".special").css("color", "red"); // filter
        $(".child").not(".special").css("opacity", "0.5");  // not
    });

    // 🔹 EFFECTS
    $("#hide").click(() => $(".box").hide());
    $("#show").click(() => $(".box").show());
    $("#toggle").click(() => $(".box").toggle());

    $("#fade").click(() => $(".box").fadeToggle());
    $("#slide").click(() => $(".box").slideToggle());

    // 🔹 ANIMATION + CONTROL
    $("#animate").click(function () {
        $(".box")
            .animate({ left: "200px" }, 1000)
            .animate({ top: "100px" }, 1000)
            .animate({ opacity: 0.5 }, 1000);
    });

    $("#stop").click(() => $(".box").stop());

    $("#queue").click(function () {
        $(".box")
            .queue(function (next) {
                $(this).css("background", "red");
                next();
            })
            .delay(1000)
            .queue(function (next) {
                $(this).css("background", "green");
                next();
            })
            .dequeue();
    });

});