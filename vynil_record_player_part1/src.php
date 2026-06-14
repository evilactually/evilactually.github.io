<?php genheader("Vinyl Record Player - Constant Speed Control", "June 14, 2026");?>

<?php h("INTRODUCTION");?>

<p>
    In this series of articles I will be building a vinyl record player mostly from scratch. I will be using an off-the-shelf motor and a headshell, but otherwise build all audio and power amplifiers myself. 
    I think this is a great way to demonstrate amplifier design and implementation.
</p>

<?php h("CONSTANT SPEED CONTROLLER");?>
<p>
    Fortunately, the record only needs to rotate at a constant angular velocity, since the groove density is varied with distance from the center during manufacturing. If that were not the case, record players would require variable-speed motors whose speed would need to be controlled by the position of the tonearm on the record.
</p>

<p>
    We can build a relatively simple speed controller using a DC motor with hall sensors and somed feedback loop.
</p>


<?php h("LINKS");?>
<p>
    Add reference links here.
</p>

