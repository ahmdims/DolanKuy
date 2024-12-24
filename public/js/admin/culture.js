document.addEventListener("DOMContentLoaded", function () {
    // Cache API Data
    let apiCache = {};

    // Tombol Edit
    $(".btn-edit").on("click", function () {
        const id = $(this).data("id");
        console.log("Editing Culture with ID:", id);

        const form = $("#formModal form");

        // Reset Form
        form[0].reset();
        form.find('input[name="_method"]').remove();
        form.append('<input type="hidden" name="_method" value="PUT">');
        form.attr("action", `/admin/culture/${id}`);

        // Perbarui Label Modal
        $("#formModalLabel").text("Edit Data Culture");

        // Set Field
        const setFields = (data) => {
            $("#name").val(data.name);
            $("#description").val(data.description);
            $('trix-editor').html(data.description);
            $("#styles").val(data.styles);
        };

        // Ambil Data dari API atau Cache
        if (apiCache[id]) {
            setFields(apiCache[id]);
        } else {
            fetch(`/admin/culture/${id}/get`)
                .then((res) => {
                    if (!res.ok) throw new Error(res.statusText);
                    return res.json();
                })
                .then((data) => {
                    apiCache[id] = data;
                    setFields(data);
                })
                .catch((err) =>
                    console.error("Error fetching user data:", err)
                );
        }
    });
});
