window.onload = function () {
    document.querySelector('#ft_list button').addEventListener('click',function () {
        add = prompt('Add a new one to do');
        if (add) {
            if (add.length === 0)
                return ;
            addNewTodo(add);
            delEvent();
            is_clicked = 0;
        }
    });
    function addNewTodo(add) {
        var list = document.querySelector('#ft_list');
        var todo = document.createElement('div');
        todo.innerHTML = add;
        list.insertBefore(todo, list.childNodes[0]);
    }
    function delEvent()
    {
       var div = document.querySelectorAll('#ft_list div');
        for (var i = 0; i < div.length; i++) {
            div[i].addEventListener("click", function () {
                this.remove();
            });
        }
    }
    delEvent();
};