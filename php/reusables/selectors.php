<!-- Inserts HTML select boxes for each of category, jobtype, and locations fields. 
    Query variables $categories, $jobTypes, and $locations are created by selectorQueries.php. -->    
<select name="category" class="search__form--selectBoxes-item" id="activeCategory">
    <option value='empty'>Category</option>
    <?php foreach($categories as $row) : ?>
        <option value="<?php echo $row['category']; ?>">
            <?php echo $row['category']; ?>
        </option>
    <?php endforeach; ?>
</select>
<select name="jobtype" class="search__form--selectBoxes-item" id="activeCategory">
    <option value='empty'>Job Type</option>
    <?php foreach($jobTypes as $row) : ?>
        <option value="<?php echo $row['jobType']; ?>">
            <?php echo $row['jobType']; ?>
        </option>
    <?php endforeach; ?>
</select>
<select name="location" class="search__form--selectBoxes-item" id="activeCategory">
    <option value='empty'>Location</option>
    <?php foreach($locations as $row) : ?>
        <option value="<?php echo $row['location']; ?>">
            <?php echo $row['location']; ?>
        </option>
    <?php endforeach; ?>
</select>
<button type="submit" name="submit" class="search__form--selectBoxes-item">Submit</button>