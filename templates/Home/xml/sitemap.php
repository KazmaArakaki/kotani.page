<?xml version="1.0" encoding="UTF-8"?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <?php foreach ($routesInfo as $routeInfo): ?>
  <url>
    <loc>
      <?= $routeInfo['url'] ?>
    </loc>

    <lastmod>
      <?= $routeInfo['modified'] ?>
    </lastmod>
  </url>
  <?php endforeach; ?>
</urlset> 

