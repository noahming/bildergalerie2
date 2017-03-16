    <div class="toolbar">
        <button type="button" onclick="exec('bold')" title="Fett"><i class="fa fa-bold"></i></button>
        <button type="button" onclick="exec('italic')" title="Kursiv"><i class="fa fa-italic"></i></button>
        <button type="button" onclick="exec('underline')" title="Unterstrichen"><i class="fa fa-underline"></i></button>
        <button type="button" onclick="exec('strikeThrough')" title="Durchgestrichen"><i class="fa fa-strikethrough"></i></button>
        <button type="button" onclick="exec('justifyleft')" title="Linksbuendig"><i class="fa fa-align-left"></i></button>
        <button type="button" onclick="exec('justifycenter')" title="Zentriert"><i class="fa fa-align-center"></i></button>
        <button type="button" onclick="exec('justifyright')" title="Rechtsbuendig"><i class="fa fa-align-right"></i></button>
        <button type="button" onclick="exec('insertunorderedlist')" title="Nicht nummerierte Liste"><i class="fa fa-list-ul"></i></button>
        <button type="button" onclick="exec('insertorderedlist')" title="Nummerierte Liste"><i class="fa fa-list-ol"></i></button>
        <button type="button" onclick="exec('removeFormat')" title="Format entfernen"><i class="fa fa-eraser"></i></button>
        <button type="button" onclick="formatblock('<h4>')" title="Ueberschrift"><i class="fa fa-header"></i></button>
        <button type="button" onclick="exec('undo')" title="Undo"><i class="fa fa-undo"></i></button>
        <button type="button" onclick="exec('redo')" title="Redo"><i class="fa fa-repeat"></i></button>
        <input id='url' style='width:200px; height: 40px; margin: 3px; font-size: 1em; font-style: italic; color: #000000' type="text" placeholder="link"/>
        <button type="button" onclick="createLink()" title="Link einfuegen"><i class="fa fa-link"></i></button>
        <button type="button" onclick="unlink()" title="Link entfernen"><i class="fa fa-chain-broken"></i></button>
    </div>
    <div class="editor" contenteditable></div>
    <div class="buttons">
        <textarea name="content" id="contentArea" hidden="hidden" required="required"></textarea>
        <button id='action' name='action' value='newrecord' type="submit">Speichern und Ver&oumlffentlichen</button>
    </div>
</div>
