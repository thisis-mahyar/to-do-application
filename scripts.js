const f = function (e) {
  const id = e.currentTarget.id.split("-")[1];

  document.querySelector("#update-id").value = id;

  document.querySelector(".modal").style.display = "grid";

  // if you click the background, the modal window disappears
  document
    .querySelector(".update-form-background")
    .addEventListener("click", function () {
      document.querySelector(".modal").style.display = "none";
    });

  // if you click the cancel button, the modal window disappears
  document
    .querySelector(".modal-cancel")
    .addEventListener("click", function () {
      document.querySelector(".modal").style.display = "none";
    });
};

const elementsUpdate = document.querySelectorAll(".update");

for (let i = 0; i < elementsUpdate.length; i++) {
  elementsUpdate[i].addEventListener("click", f);
}
