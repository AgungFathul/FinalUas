document.addEventListener("DOMContentLoaded", function() {
    // Fungsi dibawah sampai komentar berikutnya untuk merubah gambar gamelist sesuai dengan platform game yang dipilih
    var pcbutton = document.getElementById("pc");
    var mobilebutton = document.getElementById("mobile");
    var ps4button = document.getElementById("ps4");
    var consolebutton = document.getElementById("console");

    var img1 = document.getElementById("game1");
    var img2 = document.getElementById("game2");
    var img3 = document.getElementById("game3");
    var img4 = document.getElementById("game4");

    function changeImageSrc(newSrc) {
        img1.src = newSrc[0];
        img2.src = newSrc[1];
        img3.src = newSrc[2];
        img4.src = newSrc[3];
    }

    pcbutton.addEventListener('click', function() {
         changeImageSrc([
            "./assets/images/valorant.jpg",
            "./assets/images/cs2.jpg",
            "./assets/images/dota2.jpg",
            "./assets/images/pubgg.jpg"
        ]);
    });

    mobilebutton.addEventListener('click', function() {
        changeImageSrc([
            "./assets/images/lolwr.jpg",
            "./assets/images/mlbbportrait.jpg",
            "./assets/images/freefireportrait.jpg",
            "./assets/images/pubgm.jpg"
        ]);
    });

    ps4button.addEventListener('click', function() {
        changeImageSrc([
            "./assets/images/efootball.jpg",
            "./assets/images/fifa.jpg",
            "./assets/images/rocket.jpg",
            "./assets/images/codwwii.jpg"
        ]);
    });

    consolebutton.addEventListener('click', function() {
        changeImageSrc([
            "./assets/images/haloinf.jpg",
            "./assets/images/mariokart.jpg",
            "./assets/images/sports.jpg",
            "./assets/images/smash.jpg"
        ]);
    });

    // Fungsi dibawah sampai komentar berikutnya untuk merubah status aktif dari platform button
    let platformButtons = document.querySelectorAll(".platformbutt");

    platformButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            platformButtons.forEach(function(platformbutton) {
                platformbutton.classList.remove("active");
            });

            this.classList.add("active");
        });
    });

    // Fungsi dibawah sampai komentar berikutnya untuk mengubah tampilan input lokasi turnamen sesuai dengan tipe lokasi yang dipilih
    const offlineBtn = document.getElementById("offlinebtn");
    const onlineBtn = document.getElementById("onlinebtn");
    const hybridBtn = document.getElementById("hybridbtn");
    const namaTempatInputs = document.getElementsByClassName("namatempat");
    const lokasi1 = document.querySelector(".lokasi-line1");
    const lokasi2 = document.querySelector(".lokasi-line2");
    const detailAlamatInput = document.querySelector(".detailalamat");
    const detailAlamatHeader = document.querySelector(".detailalamat h6");
    const keteranganInput = document.getElementById("keterangan");

    function showInputBasedOnButton(buttonId) {
        lokasi1.style.display = "none";
        lokasi2.style.display = "none";
        for (let input of namaTempatInputs) {
          input.style.display = "none";
        }
        detailAlamatInput.style.display = "none";
        keteranganInput.style.display = "none";

        if (buttonId === "offlinebtn") {
            lokasi1.style.display = "flex";
            lokasi2.style.display = "flex";
            for (let input of namaTempatInputs) {
                input.style.display = "block";
            }
            detailAlamatInput.style.display = "block";
            detailAlamatHeader.textContent = "Detail Alamat";
            keteranganInput.style.display = "block";
            keteranganInput.setAttribute("placeholder", "Detail alamat");
        } else if (buttonId === "onlinebtn") {
            detailAlamatInput.style.display = "block";
            detailAlamatHeader.textContent = "Silahkan lanjut ke langkah berikutnya";
            keteranganInput.style.display = "none";
        } else if (buttonId === "hybridbtn") {
            lokasi1.style.display = "flex";
            lokasi2.style.display = "flex";
            for (let input of namaTempatInputs) {
                input.style.display = "block";
            }
            detailAlamatInput.style.display = "block";
            detailAlamatHeader.textContent = "Keterangan Hybrid";
            keteranganInput.style.display = "block";
            keteranganInput.setAttribute("placeholder", "Keterangan untuk turnamen hybrid");
        }
    }

    offlineBtn.addEventListener("click", () => showInputBasedOnButton("offlinebtn"));
    onlineBtn.addEventListener("click", () => showInputBasedOnButton("onlinebtn"));
    hybridBtn.addEventListener("click", () => showInputBasedOnButton("hybridbtn"));

    window.addEventListener("load", function() {
        showInputBasedOnButton("offlinebtn");
    });

    // Fungsi dibawah sampai komentar berikutnya untuk merubah status aktif dari lokasi button
    let lokasiButtons = document.querySelectorAll(".lokasibuttons");

    lokasiButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            lokasiButtons.forEach(function(lokasibutton) {
                lokasibutton.classList.remove("active");
            });

            this.classList.add("active");
        });
    });


    // Fungsi dibawah sampai komentar berikutnya untuk memunculkan dan menghilangkan hadiahinput
    function toggleHadiahDiv() {
        const divs = document.querySelectorAll('.hadiahinput');
        const hiddenDiv = Array.from(divs).find(div => window.getComputedStyle(div).display === 'none');
    
        if (hiddenDiv) {
            hiddenDiv.style.display = 'block';
        } else {
            alert("Maksimal 5 hadiah.");
        }
    
        const aturanH3 = document.querySelector('.detailturnamen h3');
        const allHidden = [...divs].every(div => window.getComputedStyle(div).display === 'none');
    
        if (allHidden) {
            aturanH3.style.marginBottom = '0';
        } else {
            aturanH3.style.marginBottom = '';
        }
    }
    
    document.getElementById('toggle-hadiah-button').addEventListener('click', toggleHadiahDiv);
    
    function removeHadiahInput(button) {
        const parentDiv = button.closest('.hadiahinput');
        parentDiv.style.display = 'none';
    }
    
    document.querySelectorAll('.remove-button').forEach(button => {
        button.addEventListener('click', function() {
            removeHadiahInput(this);
        });
    }); 

    // Fungsi dibawah sampai komentar berikutnya untuk mengubah warna border input teks Hadiah saat fokus atau blur
    const inputHadiahTexts = document.querySelectorAll('.hadiahinput input[type="text"]');

    inputHadiahTexts.forEach(input => {
        input.addEventListener('focus', function() {
            const parentHadiahInput = this.closest('.hadiahinput');
            parentHadiahInput.style.borderColor = 'var(--orange)';
        });

        input.addEventListener('blur', function() {
            const parentHadiahInput = this.closest('.hadiahinput');
            parentHadiahInput.style.borderColor = '';
        });
    });

    // Fungsi dibawah sampai komentar berikutnya untuk memunculkan dan menghilangkan faqinput
    function toggleFaqDiv() {
        const divs = document.querySelectorAll('.faqinput');
        const hiddenDiv = Array.from(divs).find(div => window.getComputedStyle(div).display === 'none');
    
        if (hiddenDiv) {
            hiddenDiv.style.display = 'block';
        } else {
            alert("Maksimal 3 faq");
        }
    
        const aturanH3 = document.querySelector('.detailturnamen h3');
        const allHidden = [...divs].every(div => window.getComputedStyle(div).display === 'none');
    
        if (allHidden) {
            aturanH3.style.marginBottom = '0';
        } else {
            aturanH3.style.marginBottom = '';
        }
    }
    
    document.getElementById('toggle-faq-button').addEventListener('click', toggleFaqDiv);
    
    function removeFaqInput(button) {
        const parentDiv = button.closest('.faqinput');
        parentDiv.style.display = 'none';
    }
    
    document.querySelectorAll('.remove-button').forEach(button => {
        button.addEventListener('click', function() {
            removeFaqInput(this);
        });
    }); 

    // Fungsi dibawah sampai komentar berikutnya untuk mengubah warna border input teks Faq saat fokus atau blur
    const inputFaqTexts = document.querySelectorAll('.faqinput input[type="text"]');

    inputFaqTexts.forEach(input => {
        input.addEventListener('focus', function() {
            const parentFaqInput = this.closest('.faqinput');
            parentFaqInput.style.borderColor = 'var(--orange)';
        });

        input.addEventListener('blur', function() {
            const parentFaqInput = this.closest('.faqinput');
            parentFaqInput.style.borderColor = '';
        });
    });

    // Fungsi dibawah sampai komentar berikutnya untuk memunculkan dan menghilangkan sponsorinput
    function toggleSponsorDiv() {
        const divs = document.querySelectorAll('.sponsorinput');
        const hiddenDiv = Array.from(divs).find(div => window.getComputedStyle(div).display === 'none');

        if (hiddenDiv) {
            hiddenDiv.style.display = 'block';
        } else {
            alert("Maksimal 3 sponsor.");
        }

        const aturanH3 = document.querySelector('.detailturnamen h3');
        const allHidden = [...divs].every(div => window.getComputedStyle(div).display === 'none');

        if (allHidden) {
            aturanH3.style.marginBottom = '0';
        } else {
            aturanH3.style.marginBottom = '';
        }
    }

    document.getElementById('toggle-sponsor-button').addEventListener('click', toggleSponsorDiv);

    function removeSponsorInput(button) {
        const parentDiv = button.closest('.sponsorinput');
        parentDiv.style.display = 'none';
    }

    document.querySelectorAll('.remove-button').forEach(button => {
        button.addEventListener('click', function() {
            removeSponsorInput(this);
        });
    });

    // Fungsi dibawah sampai komentar berikutnya untuk mengubah warna border input teks Sponsor saat fokus atau blur
    const inputSponsorTexts = document.querySelectorAll('.sponsorinput input[type="text"]');

    inputSponsorTexts.forEach(input => {
        input.addEventListener('focus', function() {
            const parentSponsorInput = this.closest('.sponsorinput');
            parentSponsorInput.style.borderColor = 'var(--orange)';
        });

        input.addEventListener('blur', function() {
            const parentSponsorInput = this.closest('.sponsorinput');
            parentSponsorInput.style.borderColor = '';
        });
    });

    // Fungsi dibawah sampai komentar berikutnya untuk menampilkan file logo sponsor yang telah diupload
    function displayFileName(input) {
        const span = input.parentNode.querySelector('.file-name');
        if (input.files.length > 0) {
            span.textContent = input.files[0].name;
        } else {
            span.textContent = '';
        }
    }

    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener('change', function() {
        displayFileName(this);
        });
    });
});
