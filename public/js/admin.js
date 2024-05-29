// For sidebar
document.addEventListener("DOMContentLoaded", function () {
    var sidebar = document.getElementById("sidebar");
    var btnHamburger = document.getElementById("btn-hamburger");

    btnHamburger.addEventListener("click", function () {
        sidebar.classList.toggle("sidebar-active");
    });
});

// Alert confirmation add student
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("add-student-form");
    form.addEventListener("submit", function (event) {
        const confirmation = confirm("Apakah anda ingin menambahkan siswa?");
        if (!confirmation) {
            event.preventDefault();
        }
    });
});

// Alert confirmation edit student
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("edit-student-form");
    form.addEventListener("submit", function (event) {
        const confirmation = confirm("Apakah anda ingin mengupdate siswa?");
        if (!confirmation) {
            event.preventDefault();
        }
    });
});

// Alert confirmation add teacher
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("add-teacher-form");
    form.addEventListener("submit", function (event) {
        const confirmation = confirm("Apakah anda ingin menambah guru?");
        if (!confirmation) {
            event.preventDefault();
        }
    });
});

// Alert confirmation edit teacher
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("edit-teacher-form");
    form.addEventListener("submit", function (event) {
        const confirmation = confirm("Apakah anda ingin mengupdate guru?");
        if (!confirmation) {
            event.preventDefault();
        }
    });
});

// Alert confirmation add class
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("add-class-form");
    form.addEventListener("submit", function (event) {
        const confirmation = confirm("Apakah anda ingin menambahkan kelas?");
        if (!confirmation) {
            event.preventDefault();
        }
    });
});

// Alert confirmation edit class
document.addEventListener("DOMContentLoaded", function () {
    const forms = document.querySelectorAll(".edit-class-form");
    forms.forEach((form) => {
        form.addEventListener("submit", function (event) {
            const confirmation = confirm(
                "Apakah anda ingin mengupdate data kelas?"
            );
            if (!confirmation) {
                event.preventDefault();
            }
        });
    });
});

// Alert confirmation add mapel
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("add-mapel-form");
    form.addEventListener("submit", function (event) {
        const confirmation = confirm(
            "Apakah anda ingin menambahkan mata pelajaran?"
        );
        if (!confirmation) {
            event.preventDefault();
        }
    });
});

// Alert confirmation edit mapel
document.addEventListener("DOMContentLoaded", function () {
    const forms = document.querySelectorAll(".edit-mapel-form");
    forms.forEach((form) => {
        form.addEventListener("submit", function (event) {
            const confirmation = confirm(
                "Apakah anda ingin mengupdate data mata pelajaran?"
            );
            if (!confirmation) {
                event.preventDefault();
            }
        });
    });
});

// Alert confirmation add tapel
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("add-tapel-form");
    form.addEventListener("submit", function (event) {
        const confirmation = confirm(
            "Apakah anda ingin menambahkan tahun pelajaran? Jika iya, maka anda akan diminta untuk login kembali"
        );
        if (!confirmation) {
            event.preventDefault();
        }
    });
});

// Alert confirmation add pembelajaran
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("add-pembelajaran-form");
    form.addEventListener("submit", function (event) {
        const confirmation = confirm(
            "Apakah anda ingin menambahkan pembelajaran?"
        );
        if (!confirmation) {
            event.preventDefault();
        }
    });
});

// Alert confirmation edit pembelajaran
document.addEventListener("DOMContentLoaded", function () {
    const forms = document.querySelectorAll(".edit-pembelajaran-form");
    forms.forEach((form) => {
        form.addEventListener("submit", function (event) {
            const confirmation = confirm(
                "Apakah anda ingin mengupdate data pembelajaran?"
            );
            if (!confirmation) {
                event.preventDefault();
            }
        });
    });
});
