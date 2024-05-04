
$(function () {
	var previousMenuSiswa = null; // Menyimpan referensi ke elemen "menuSiswa" sebelumnya

	$(".btnMenuSiswa").on("click", function () {
		var idsiswa = $(this).data("idsiswa");

		// Mengubah display menjadi "none" pada elemen "menuSiswa" sebelumnya
		if (previousMenuSiswa !== null) {
			previousMenuSiswa.style.display = "none";
		}

		var menuSiswa = document.getElementById("menuSiswaD" + idsiswa);

		menuSiswa.style.display = "block";

		previousMenuSiswa = menuSiswa; // Menyimpan elemen "menuSiswa" sebagai "previousMenuSiswa" untuk digunakan di klik berikutnya
	});
	
	$(".btnMenuSiswaSurah").on("click", function () {
		var idsiswa = $(this).data("idsiswa");

		// Mengubah display menjadi "none" pada elemen "menuSiswa" sebelumnya
		if (previousMenuSiswa !== null) {
			previousMenuSiswa.style.display = "none";
		}

		var menuSiswa = document.getElementById("menuSiswaDSurah" + idsiswa);

		menuSiswa.style.display = "block";

		previousMenuSiswa = menuSiswa; // Menyimpan elemen "menuSiswa" sebagai "previousMenuSiswa" untuk digunakan di klik berikutnya
	});

	$(".topMenuSiswa").on("touchstart", function () {
		// Mengubah display menjadi "none" pada elemen "menuSiswa" saat elemen dengan id "topMenuSiswa" disentuh
		if (previousMenuSiswa !== null) {
			previousMenuSiswa.style.display = "none";
		} else {
			console.log('ok');
		}
	});
	


});