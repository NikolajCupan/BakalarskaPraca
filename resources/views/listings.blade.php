<h1>Listings</h1>

<?php foreach($listings as $listing) { ?>
    <h2> <?php echo $listing['title'] ?> </h2>
    <p> <?php echo $listing['description'] ?> </p>
<?php } ?>
