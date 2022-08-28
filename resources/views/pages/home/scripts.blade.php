<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script>
    const simpleLists = document.getElementsByClassName("simpleList");
    for (let index = 0; index < simpleLists.length; index++) {
        var el = document.getElementById(`simpleList-${index + 1}`);
        var sortable = Sortable.create(el, {
            group: 'shared',
            onAdd: function(evt) { // add to another card
                addListToCard(evt);
            },
            onUpdate: function(evt) { // update list
                updateListTask(evt);
            },

        });
    }

    function addListToCard(evt) {
        console.log('evt', evt);
    }

    function updateListTask(evt) {
        console.log('evt', evt);
    }
</script>
