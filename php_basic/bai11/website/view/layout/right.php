<section>
    <form >
        <input type="hidden" name="option" value="showproducts">
        <input type="range" name="range" min="100000" max="100000000"  step="500000" oninput="document.getElementById('max').innerHTML=this.value;">
        <span id="max"><?= isset($_GET['range'])?$_GET['range']:""; ?></span> <br>
        <input type="submit" value="Search">
    </form>
</section>