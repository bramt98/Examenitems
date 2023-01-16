console.log("running");

if( document.getElementById("createPostModal") ) {
    document.getElementById("createPostModal").addEventListener("click", function () {
        console.log("Button clicked");
        document.getElementById("createPostForm").click();
  });
}

if(document.querySelectorAll(".btnModal")) {
    for (let i=0; i < document.querySelectorAll(".btnModal").length; i++ ) {
        document.querySelectorAll(".btnModal")[i].addEventListener("click", () => {
            let getValue = document.querySelectorAll(".btnModal")[i].nextElementSibling.value;
            console.log(getValue);

            document.getElementById("modalValue").value = getValue;
        });
    }
        document.querySelector(".btnDeleteModal").addEventListener("click", () => {
            let getButton = document.getElementById("modalValue").value;

            document.querySelector(`.${getButton}`).click();
        });

}

if( document.getElementById("addDocentModal") ) {
    document.getElementById("addDocentModal").addEventListener("click", function () {
        document.getElementById("addDocentForm").click();
    });
}

if( document.getElementById("addDocentModal") ) {
    document.getElementById("addDocentModal").addEventListener("click", function () {
        document.getElementById("addDocentForm").click();
    });
}

if(document.querySelectorAll(".insModal")) {
    for (let i=0; i < document.querySelectorAll(".insModal").length; i++ ) {
        document.querySelectorAll(".insModal")[i].addEventListener("click", () => {
            let getValue = document.querySelectorAll(".insModal")[i].nextElementSibling.value;
            console.log(getValue);

            document.getElementById("modalValue").value = getValue;
        });
    }
    document.querySelector(".btnInsModal").addEventListener("click", () => {
        let getButton = document.getElementById("modalValue").value;

        document.querySelector(`.${getButton}`).click();
    });

}