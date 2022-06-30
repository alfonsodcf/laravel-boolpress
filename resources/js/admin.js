

require('./bootstrap');

window.boolpress = {
    currentForm: null,
    itemid: null,
    openModal(e,id){
        e.preventDefault();
       // console.log(id);
        this.itemid = id;
       // console.log(e.currentTarget);
        this.currentForm= e.currentTarget.parentNode;
        //console.log(this.currentForm);
        $('#deleteModal-body').html(`Sei sicuro di voler eliminare l'elemento con id: ${this.itemid}`);
        $('#deleteModal').modal('show');
    },
    previewImage(){
        var oFReader = new FileReader();
        oFReader.readAsDateURL(document.getElementById("image").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    },
    submitForm(){
        this.currentForm.submit();
    }
}
