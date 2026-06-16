<?php 
include '../includes/config.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jeffrey Yeung - Resume</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <div class="container">

    <header>
      <div>
        <h1>Jeffrey Yeung</h1>
        <div class="subtitle">Junior System Administrator | </div>
      </div>
      <div class="contact">
        <div>Philadelphia, PA</div>
        <a href="mailto:jeffrey.yeung11@gmail.com">jyeung@jefffolio.com</a>
        <a href="https://www.linkedin.com/in/jeffrey-yeung-4596812b7" target="_blank" rel="noopener">LinkedIn</a>
        <!---<a href="https://github.com/yourname" target="_blank" rel="noopener">GitHub</a>-->
      </div>
    </header>

    <section>
      <h2>Summary</h2>
      <p>
        IT professional with experience administering Linux and Windows server environments, networking services, monitoring platforms, and infrastructure technologies in both production and lab environments. Skilled in Active Directory, Group Policy, Docker, DNS, VPNs, MariaDB, backups, and system monitoring, with a strong foundation in troubleshooting, documentation, and infrastructure operations. Seeking to contribute systems administration, networking, and infrastructure expertise within a systems engineering or infrastructure operations team       </p>     
     </section>

    <section>
      <h2>Experience</h2>

      <div class="item">
        <div class="item-header">
          <div class="role">System Administrator (Server Support Specialist L1)</div>
          <div class="meta">2024 – Present</div>
        </div>
        <ul>
          <li>Administer and troubleshoot Linux and Windows virtual/dedicated servers in a large-scale hosting environment.</li>
          <li>Diagnose and resolve web, mail, DNS, and network service issues across Linux and Windows servers (HTTP/HTTPS, SMTP, TCP/IP).</li>
          <li>Configure and maintain Plesk hosting services including SSL deployment, mail services, and DNS settings.</li>
		  <li>Investigate service outages, access failures, and configuration errors across customer server environments.</li>
		  <li>Collaborate with L2 teams by gathering diagnostics, reproducing issues, and supporting escalation handoffs.</li>
		  <li>Support production hosting infrastructure serving internet-facing applications and services</li>
        </ul>
      </div>

      <!--<div class="item">
        <div class="item-header">
          <div class="role">Previous Role — Company</div>
          <div class="meta">2020 – 2022</div>
        </div>
        <ul>
          <li>Relevant accomplishment or responsibility.</li>
          <li>Customer, infrastructure, or project scope.</li>
        </ul>
      </div>-->
	  
   </section>

	<section>
          <h2>Projects</h2>
	  <div class="item">
      <div class="item-header">
        <div class="role">Active Directory & Group Policy Administration Lab </div>
      </div>
      <ul>
        <li>Deployed and administering a Windows Server 2022 Active Directory environment, managing Organizational Units (OUs), user accounts, security groups, Group Policy Objects (GPOs), and authentication policies.</li>
        <li>Implement role-based access controls, delegated permissions, password policies, and account restrictions while troubleshooting user access, permissions, and Group Policy issues.</li>
        <li>CDocument server configurations, administrative procedures, and access control policies to support system management and maintenance.</li>
      </ul>
    </div>

	  <div class="item">
      <div class="item-header">
        <div class="role">Docker Infrastructure & Systems Administration Environment</div>
      </div>
        <ul>
          <li>Built and currently maintaining a multi-service infrastructure environment using Docker and Docker Compose hosting web applications, databases, monitoring platforms, and reverse proxy services.</li>
          <li>Configure Nginx, Apache, MariaDB, WireGuard VPN, Grafana, and Prometheus to support secure application hosting, monitoring, remote administration, and infrastructure visibility.</li>
          <li>Implement backup and recovery workflows using Acronis Cyber Protect, validating restore procedures to improve data protection and business continuity. </li>
          <li>Troubleshoot SSH, SFTP, DNS, networking, authentication, permissions, database connectivity, and application availability issues while creating technical documentation and deployment procedures.</li>
        </ul>
      </div>

      <div class="item">
        <div class="item-header">
          <div class="role">Proxmox Virtualization Lab</div>
        </div>
          <ul>
            <li>Installed and configured Proxmox VE, deploying Windows Server 2022, Windows 11 Enterprise, and Ubuntu virtual machines for systems administration and networking labs. </li>
            <li>Provisioned and managed virtual machine resources including CPU, memory, storage, and networking configurations to support Windows and Linux workloads.</li>
            <li>Utilized snapshots and rollback functionality to safely test system configuration changes and recover lab environments during troubleshooting.</li>
            <li>Created Ubuntu VM templates to streamline deployment of additional Linux servers and support rapid lab provisioning.</li>
          </ul>
        </div>
	</section>

	<section>
	  <h2>Technical Skills</h2>

	  <?php
	  $result = $conn->query("SELECT * FROM technical_skills ORDER BY sort_order");

	  while ($row = $result->fetch_assoc()) {
		  echo '<div class="item">';
		  echo '<div class="role">' . htmlspecialchars($row['category']) . ':</div>';
		  echo '<div class="meta">' . htmlspecialchars($row['skills']) . '</div>';
		  echo '</div>';
	  }
	  ?>
	</section>



	<section>
	  <h2>Education & Certifications</h2>

	  <?php
	  $result = $conn->query("SELECT * FROM certifications ORDER BY sort_order");

	  while ($row = $result->fetch_assoc()) {
		  echo '<div class="item">';
		  echo '<div class="item-header">';
		  echo '<div class="role">' . htmlspecialchars($row['name']) . '</div>';
		  echo '<div class="meta">' . htmlspecialchars($row['year']) . '</div>';
		  echo '</div>';
		  echo '<div class="meta">' . htmlspecialchars($row['issuer']) . '</div>';
		  echo '</div>';
	  }
	  ?>
	</section>


    <footer>
      © 2026 Jeffrey Yeung
    </footer>

  </div>
</body>
</html>
