<?php
require '../bin/config/database.php';
$xmlGenerationTo1 = $db->query('UPDATE clients SET xml_generation = 1 WHERE xml_generation = 0');
?>
<script type="text/javascript">
    console.log("xmlGeneration1")
</script>
