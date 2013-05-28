<select name="score" id="score">
<option value="0"<?php if($data["score"]==NULL) echo ' selected'; ?>>Select</option>
<option value="10"<?php if($data["score"]==10) echo ' selected'; ?>>(10) Masterpiece</option>
<option value="9"<?php if($data["score"]==9) echo ' selected'; ?>>(9) Great</option>
<option value="8"<?php if($data["score"]==8) echo ' selected'; ?>>(8) Very Good</option>
<option value="7"<?php if($data["score"]==7) echo ' selected'; ?>>(7) Good</option>
<option value="6"<?php if($data["score"]==6) echo ' selected'; ?>>(6) Fine</option>
<option value="5"<?php if($data["score"]==5) echo ' selected'; ?>>(5) Average</option>
<option value="4"<?php if($data["score"]==4) echo ' selected'; ?>>(4) Bad</option>
<option value="3"<?php if($data["score"]==3) echo ' selected'; ?>>(3) Very Bad</option>
<option value="2"<?php if($data["score"]==2) echo ' selected'; ?>>(2) Horrible</option>
<option value="1"<?php if($data["score"]==1) echo ' selected'; ?>>(1) Appalling</option>
</select>