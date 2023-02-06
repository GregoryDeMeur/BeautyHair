

<script>
 $(document).ready(function() {
  var calendarEl = document.getElementById("calendarScheduleSalonAjax");

  var calendar = new FullCalendar.Calendar(calendarEl, {
    eventLimit: true,
    locale:'fr',
    plugins: ["dayGrid", "timeGrid", "list", "interaction"],
    header: {
      left: "prev,next today",
      center: "title",
      right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek"
    },
    events: [<?php
    $sep = "";
    foreach ($appointment as $key => $row)
    {
      echo $sep;
      echo "{title:'".$row['title']."',";
      echo "start:'".$row['appointment_start']."',";
      echo "end:'".$row['appointment_end']."'}"; 
      $sep = ",";

    } ?>
    ]
  });

  calendar.render();
});
</script>
