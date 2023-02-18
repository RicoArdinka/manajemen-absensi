//akan meload semua document yg ada
$("document").ready(function () {
	// jika ini diklik maka
	$("#sidebarCollapse").click(function () {
		$("#sidebar").toggleClass("tutup"); //jika belum ada class tutup maka dibuatkan / jika ada dihapus
		$("#content").toggleClass("layarPenuh"); //jika belum ada class layar penuh maka dibuatkan / jika ada dihapus
	});
});
