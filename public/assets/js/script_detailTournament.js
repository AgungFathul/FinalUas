document.querySelectorAll(".tab-btn").forEach((tab) => {
  tab.addEventListener("click", (e) => {
    // Remove active class from all tabs
    document.querySelectorAll(".tab-btn").forEach((t) => {
      t.classList.remove("active");
    });

    // Add active class to current tab
    e.target.classList.add("active");

    // Get content element
    const content = document.querySelector(e.target.dataset.target);
    console.log(content);

    // Remove active class from all content
    document.querySelectorAll(".content").forEach((c) => {
      c.classList.remove("active");
    });

    // Add active class to current content
    content.classList.add("active");
  });
});

// script_detailTournament.js

const tourBgElement = document.querySelector(".tour-bg");
const tournamentId = tourBgElement.dataset.tournamentId;

if (tournamentId) {
  fetch("/GasLogin/assets/js/data/data_detailTour.json")
    .then((response) => response.json())
    .then((data) => {
      // Mendapatkan tournament berdasarkan ID
      const tournament = data.find((t) => t.id === tournamentId);

      // Memperbarui CSS background
      if (tournament) {
        tourBgElement.style.backgroundImage = `linear-gradient(rgba(0, 0, 0, 0), var(--xiketic)), url(${tournament.bgImage})`;
      } else {
        console.error(
          `Tournament with id ${tournamentId} not found in JSON data.`
        );
      }
    })
    .catch((error) => console.error(error));
} else {
  console.error("data-tournament-id attribute not set on.tour-bg element.");
}

// pop up
const modal = document.getElementById("regist-tour");
const btn = document.querySelector(".reg-button");
const span = document.getElementsByClassName("close-button")[0];

btn.addEventListener("click", () => {
  modal.style.display = "block";
});

span.addEventListener("click", () => {
  modal.style.display = "none";
});

window.addEventListener("click", (event) => {
  if (event.target == modal) {
    modal.style.display = "none";
  }
});

//untuk map
