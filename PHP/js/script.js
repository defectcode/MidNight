// Scurtarea unui URL
$.post("index.php", { action: "shorten_url", url: "https://example.com" }, function(data) {
    console.log("URL scurt: " + data);
});

// Redirecționarea către URL-ul original
window.location.href = "index.php?action=redirect&short=abcd123";

// Obținerea tuturor linkurilor pentru un utilizator
$.get("index.php?action=get_links&user=admin", function(data) {
    console.log("Linkuri pentru admin: " + data);
});
