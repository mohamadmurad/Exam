
<script>
    let numb = document.getElementById("accordionExample");
    let newQDI = 1;
    if (numb) {
        numb = numb.childElementCount;
        newQDI = numb + 1;
    }


    const checkbox = document.getElementById('typeId')

    if (checkbox) {
        checkbox.addEventListener('change', (event) => {
            if (event.currentTarget.checked) {
                document.getElementById('letter').style.display = "none";
                document.getElementById('vid').style.display = "block";
            } else {
                document.getElementById('letter').style.display = "block";
                document.getElementById('vid').style.display = "none";
            }
        })
    }

    function qTypeChange(event) {

        let id = event.target.getAttribute("data-id");
        if (event.currentTarget.checked) {

            $('#multiple-choice_' + id).show();
            $('#multiple-choice_' + id + " :input").each(function () {
                $(this).attr('required', 'required');
            });


            $('#answer_' + id).hide();
            $('#answer_' + id + " textarea").each(function () {
                $(this).removeAttr('required');
            });
        } else {

            $('#answer_' + id).show();
            $('#answer_' + id + " textarea").each(function () {
                $(this).attr('required', 'required');
            });

            $('#multiple-choice_' + id).hide();
            $('#multiple-choice_' + id + " input").each(function () {
                $(this).removeAttr('required');
            });
        }

    }

    function delQ(el, event) {
        console.log(event);
        let id = event.target.getAttribute("data-id");
        console.log(id);
        $(el).parent().parent().remove();

    }





    function delete_submit(event) {

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                event.closest('form').submit();
            }
        })
    }


    function x() {

        var template = document.getElementById("questions_template");
        // Get the contents of the template
        var templateHtml = template.innerHTML;
        // Final HTML variable as empty string

        templateHtml = templateHtml.replace(/<%= id %>/g, newQDI++);
        $("#accordionExample").append(templateHtml);
    }



</script>
