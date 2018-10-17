<!-- Inserts HTML select boxes for each of category, jobtype, and locations fields. 
    Query variables $categories, $jobTypes, and $locations are created by selectorQueries.php. --> 
    
<select name="category" class="search__form--selectBoxes-item" id="activeCategory">
    <option value='empty'>Category Unselected</option>
    
    <?php foreach($categories as $row) : ?> 
        <?php $selected = ""; ?> 
        <?php if($row['category']==$categorySearchID) {$selected = 'selected';} ?>
        <option value="<?php echo $row['category']; ?>" <?php echo $selected; ?>>
            <?php echo $row['category']; ?>
        </option>
    <?php endforeach; ?>
</select>
<select name="jobtype" class="search__form--selectBoxes-item" id="activeCategory">
    <option value='empty'>Job Type Unselected</option>
    <?php foreach($jobTypes as $row) : ?>
        <?php $selected = ""; ?>
        <?php if($row['jobType']==$jobtypeSearchID) {$selected = 'selected';} ?>
        <option value="<?php echo $row['jobType']; ?>" <?php echo $selected; ?>>
            <?php echo $row['jobType']; ?>
        </option>
    <?php endforeach; ?>
</select>
<select name="location" class="search__form--selectBoxes-item" id="activeCategory">
    <option value='empty'>Location Unselected</option>
    <?php foreach($locations as $row) : ?>
        <?php $selected = ""; ?>
        <?php if($row['location']==$locationSearchID) {$selected = 'selected';} ?>
        <option value="<?php echo $row['location']; ?>" <?php echo $selected; ?>>
            <?php echo $row['location']; ?>
        </option>
    <?php endforeach; ?>
</select>
<button type="submit" name="submit" class="search__form--selectBoxes-item">Submit</button>