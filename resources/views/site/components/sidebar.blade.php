<div class="sidebar-area mt-xs-45">
    <div class="single-sidebar-widget mb-45">
        <h3>Últimos adicionados</h3>
        @foreach ($dez_filmes as $filme)
            <div class="single-featured-game mb-20">
                <div class="game-img">
                    <iframe width="100%" height="150px" src="{{ $filme->link_filme }}" frameborder="0" allowfullscreen></iframe>
                    <a class="game-title" href="#">the killer</a>
                </div>
            </div>
        @endforeach

    </div>

</div>

