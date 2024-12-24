document.addEventListener("DOMContentLoaded", function () {
    // Cache API Data
    let apiCache = {};

    // Tombol Edit
    $(".btn-edit").on("click", function () {
        const id = $(this).data("id");
        console.log("Editing Destination with ID:", id);

        const form = $("#formModal form");

        // Reset Form
        form[0].reset();
        form.find('input[name="_method"]').remove();
        form.append('<input type="hidden" name="_method" value="PUT">');
        form.attr("action", `/admin/destination/${id}`);

        // Perbarui Label Modal
        $("#formModalLabel").text("Edit Data Destination");

        // Set Field
        const setFields = (data) => {
            $("#name").val(data.name);
            $("#description").val(data.description);
            $('trix-editor').html(data.description);
            $("#address").val(data.address);
            $("#city").val(data.city);
            $("#province").val(data.province);
            $("#latitude").val(data.latitude);
            $("#longitude").val(data.longitude);
            $("#link").val(data.link);
            $("#opening_time").val(data.opening_time);
            $("#closing_time").val(data.closing_time);
            $("#price_min").val(data.price_min);
            $("#price_max").val(data.price_max);
            $("#facilities").val(data.facilities);
            $("#contact").val(data.contact);
            $("#styles").val(data.styles);
        };

        // Ambil Data dari API atau Cache
        if (apiCache[id]) {
            setFields(apiCache[id]);
        } else {
            fetch(`/admin/destination/${id}/get`)
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
