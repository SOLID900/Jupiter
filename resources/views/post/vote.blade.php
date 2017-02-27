<div class="btn-group btn-group-sm btn-group-justified" role="group" aria-label="Votes">
    <div class="btn-group" role="group">
        <button type="button" class="btn btn-default" onclick="vote(0, {{ $post_id }});" id="vm{{ $post_id }}">
            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
        </button>
    </div>
    <div class="btn-group" role="group">
        <? $percentage = ($plus+$minus == 0) ? 0 : round((($plus - $minus) / ($plus+$minus)) * 100); ?>
        <button type="button" class="btn btn-default button-color-perc-{{ $percentage + 100 }}" data-toggle="tooltip" data-placement="top" data-html="true"
                title="{{ $plus }} <span class='glyphicon glyphicon-plus' aria-hidden='true'></span> {{ $minus }} <span class='glyphicon glyphicon-minus' aria-hidden='true'></span>">
            &zwnj;
        </button>
    </div>
    <div class="btn-group" role="group">
        <button type="button" class="btn btn-default" onclick="vote(1, {{ $post_id }});" id="vp{{ $post_id }}">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>
    </div>
</div>