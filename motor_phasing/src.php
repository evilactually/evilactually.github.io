<?php genheader("Detecting motor phasing from back-EMF", "September 7, 2024");?>

<ul id="id01">
  <li>FROM HALL SIGNAL TO COMMUTATION STATE</li>
  <li>Stockholm</li>
  <li>Helsinki</li>
  <li>Berlin</li>
  <li>Rome</li>
  <li>Madrid</li>
</ul>

<!-- <?php h("MOTOR TALES FROM INDUSTRY");?><p>
    As part of my job on an autonomous mower vehicle I was involved in designing a brushless motor for reel cutting units. We bought frame-less motors, which is a kind of do-it-yourself motor that comes as a kit made of stator and a rotor, perfectly useless as a motor by itself. The mechanical engineers stuck it in a metal frame, hammered a shaft into it and turned it into an actual motor. The electrical engineers (that was just me at the time) ensured the motor could be connected to an "off-the-shelf" controller. The controller needs sensors to know what the motor is doing. Since the frame-less motor did not have any hall sensors it was my job to put them there in a form of a very clever PCB. The PCB didn't do anything extraordinary by itself other than placing three hall sensors at seemingly random places. This illusion of simplicity is deceptive. The most difficult part of designing such a hall sensor PCB is understanding of motor geometry to determine the correct placement for the motor. This could be a topic for another fascinating article, but I'm merely saying it here to give you an idea that I do know what I'm talking about. I've spent many days spinning up motors all day long so that even now I get an odd sense of satisfaction when I see a motor spinning smoothly. Maybe it is because most of the motors I made did not do that or span in a wrong direction or worse tried to take my hand off.
</p> -->
<p>
    When you spend too much time tinkering with motors you start to observe some patterns in their behavior that are not necessarily spelled out anywhere "in the books" so to speak. It is almost as if motors speak some common universal 3-phase language known only among them, and occasionally you can eavesdrop on a conversation that was not intended for you. One of the patterns I noticed, is that the EMF produced by the three phases of the motor awfully resembles a hall sensor signal. This signal can be used to at least determine the direction the motor is spinning. In fact, there are motor phase testers on the market that are probably using this simple principle. 
<br/>
   <picture  >
    <source srcset="fluke.jpg" type="image/jpeg">
    <?php img("fluke.jpg", 50, "display: block; margin-top: 2ch; margin-bottom: 2ch; margin-left: auto;margin-right: auto;");?>
  </picture>
  <span style="text-align: center; display: block; margin-bottom: 2ch;"><i><small>Once you find it's possible to do something you find Fluke sells a tool for it...</small></i></span>
</p>

<?php h("HOW DOES ROTOR PRODUCE A HALL SIGNAL?");?><p>

</p>
<?php h("FROM HALL SIGNAL TO COMMUTATION STATE");?><p>
    It is instructive first to learn how to decode hall sensor signal to determine motor position, also known as commutation state. "Commutation" is another word for "switching", in particular switching of currents through motor windings. In simple "6-step" motor controllers, rotor position is synonymous with commutation state because the rotor position determines which coils get energized and the direction of current that flows through them. Only two of the three coils are ever active at the same time, and one is inactive. In total there's six commutation states, and coincidentally only six rotor positions. 
</p>
<?php h("FROM COMMUTATION STATE TO ELECTRICAL DEGREES (EDEG)");?><p>
</p>
<?php h("FROM ELECTRICAL DEGREES (EDEG) TO MECHANICAL DEGREES (MDEG)");?><p>
</p>




     Pursuing this further would probably lead me to a math-wizard territory of Field Oriented Controllers, and leave me too confused. Since my interest is in gaining and sharing practical intuition, not writing a thesis I chose to avoid peering into that advanced topic for now. 

    This observation came very handy to me recently. Even though we scrapped the custom motor project mainly due to lack of a suitable controller and bought ready-made motors and controllers from a major motor manufacturer. 




    The language is that of 3-phase electricity. So much of electrical grid is built around 3-phase electricity that those ideas and principles have spread out to technologies not interfacing directly to the power grid. For example, the simple square-wave 6-step commutation pattern of a brushless electric motor is nothing more than 3-phase sinusoidal waveform turned into 3-phase square waveform! The similarity of the two waveforms is hardly a coincidence and it must be a result of evolution of technology.
</p>

<?php h("FROM HALL SIGNAL TO COMMUTATION STATE");?><p>
    
</p>

<?h("");?><p>
    
</p>