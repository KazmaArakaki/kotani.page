// docs/ 全ページ共通のサイドバー。
// 自身の <script src> から docs/ ルートへの相対パスを求めるので、どの階層のページから読み込んでもリンクが正しくなる。
(() => {
  const script = document.currentScript;
  const root = script.getAttribute("src").replace(/sidebar\.js$/, "");

  // ページを追加したら、ここへ追記する（path は docs/ ルートからの相対パス）。
  const groups = [
    {
      title: "はじめに",
      items: [
        { path: "index.html", label: "ドキュメントの入口" },
        { path: "glossary.html", label: "用語集" },
        { path: "conventions.html", label: "開発規約" },
      ],
    },
    {
      title: "機能",
      items: [
        { path: "features/index.html", label: "機能一覧" },
        { path: "features/homepage/index.html", label: "トップページ配信", indent: 1 },
      ],
    },
    {
      title: "セッション",
      index: { path: "sessions/index.html", label: "セッション履歴" },
      // 新しいものを先頭に書く。表示は直近5件まで。
      sessions: [
        {
          path: "features/homepage/sessions/20261022-0017-migrate-to-workers/index.html",
          label: "PHP から Workers へ移行",
          date: "2026-10-22",
        },
      ],
    },
    {
      title: "課題",
      index: { path: "issues/index.html", label: "課題一覧" },
      // done: true にするとサイドバーから消える（課題一覧からは引き続き辿れる）。
      issues: [
        { path: "issues/jsonld-thursday-open/index.html", label: "JSON-LD で木曜が営業日", priority: "高" },
        { path: "issues/og-image-relative-path/index.html", label: "og:image が相対パス", priority: "中" },
        { path: "issues/navitime-link-empty/index.html", label: "NAVITIME リンクが空", priority: "中" },
        { path: "issues/years-in-business-hardcoded/index.html", label: "「２９年目」が固定", priority: "中" },
        { path: "issues/sitemap-lastmod-stale/index.html", label: "sitemap の lastmod", priority: "低" },
      ],
    },
    {
      title: "UI",
      items: [
        { path: "ui/principles.html", label: "UI の基本方針" },
        { path: "ui/components/index.html", label: "コンポーネント" },
        { path: "ui/components/navigation/index.html", label: "ナビゲーション", indent: 1 },
        { path: "ui/components/primary-action/index.html", label: "電話ボタン", indent: 1 },
        { path: "ui/components/section-category/index.html", label: "診療科目タイル", indent: 1 },
        { path: "ui/pages/index.html", label: "ページ見本" },
        { path: "ui/pages/site/index.html", label: "トップページ", indent: 1 },
        { path: "ui/pages/site/404/index.html", label: "404 ページ", indent: 1 },
      ],
    },
    {
      title: "データベース",
      items: [{ path: "database/index.html", label: "データベース構成" }],
    },
  ];

  const SESSION_LIMIT = 5;

  const style = document.createElement("style");
  style.textContent = `
    .kd-sidebar { position: fixed; inset: 0 auto 0 0; z-index: 50; width: 17rem; overflow-y: auto;
      padding: 1.5rem 1.25rem 3rem; background: #efe7d8; border-right: 1px solid #d9cfbe;
      font-family: "Zen Kaku Gothic New", sans-serif; color: #2b2622; transform: translateX(-100%);
      transition: transform .25s ease; }
    .kd-sidebar[data-open="true"] { transform: none; box-shadow: 0 0 0 100vmax rgb(43 38 34 / .35); }
    @media (min-width: 1024px) { .kd-sidebar { transform: none; } .kd-sidebar[data-open="true"] { box-shadow: none; } }
    .kd-brand { display: block; margin-bottom: 1.5rem; font-family: "Shippori Mincho B1", serif; font-weight: 800;
      font-size: 1.05rem; letter-spacing: .2em; color: inherit; text-decoration: none; }
    .kd-brand small { display: block; margin-top: .25rem; font-family: "IBM Plex Mono", monospace; font-weight: 400;
      font-size: .7rem; letter-spacing: .05em; color: #6b6159; }
    .kd-group { margin-bottom: 1.25rem; }
    .kd-group h2 { margin: 0 0 .4rem; font-family: "IBM Plex Mono", monospace; font-size: .68rem; font-weight: 500;
      letter-spacing: .18em; color: #b8466b; }
    .kd-group ul { list-style: none; margin: 0; padding: 0; }
    .kd-group a { display: flex; gap: .4rem; align-items: baseline; padding: .28rem .5rem; border-radius: .3rem;
      font-size: .86rem; line-height: 1.45; color: inherit; text-decoration: none; }
    .kd-group a:hover { background: #f7f2e8; }
    .kd-group a[aria-current="page"] { background: #2b2622; color: #f7f2e8; }
    .kd-group a[data-indent="1"] { margin-left: .9rem; font-size: .82rem; }
    .kd-meta { margin-left: auto; flex: none; font-family: "IBM Plex Mono", monospace; font-size: .66rem; opacity: .7; }
    .kd-prio { flex: none; font-size: .66rem; padding: 0 .3rem; border-radius: .2rem; border: 1px solid currentColor; }
    .kd-prio[data-p="高"] { color: #b8466b; } .kd-prio[data-p="中"] { color: #8a6a1f; } .kd-prio[data-p="低"] { color: #6b6159; }
    .kd-more { font-size: .76rem !important; color: #6b6159 !important; }
    .kd-toggle { position: fixed; top: .75rem; left: .75rem; z-index: 60; padding: .45rem .7rem; border: 1px solid #d9cfbe;
      border-radius: .4rem; background: #f7f2e8; font: 500 .8rem "Zen Kaku Gothic New", sans-serif; color: #2b2622; }
    @media (min-width: 1024px) { .kd-toggle { display: none; } }
  `;
  document.head.appendChild(style);

  const here = new URL(location.href);
  here.hash = "";
  here.search = "";

  const link = (path, label, extra = {}) => {
    const a = document.createElement("a");
    a.href = root + path;
    a.textContent = label;
    if (extra.indent) a.dataset.indent = String(extra.indent);
    const target = new URL(a.href);
    if (target.href === here.href || target.href === here.href + "index.html") a.setAttribute("aria-current", "page");
    if (extra.priority) {
      const tag = document.createElement("span");
      tag.className = "kd-prio";
      tag.dataset.p = extra.priority;
      tag.textContent = extra.priority;
      a.prepend(tag);
    }
    if (extra.meta) {
      const meta = document.createElement("span");
      meta.className = "kd-meta";
      meta.textContent = extra.meta;
      a.append(meta);
    }
    const li = document.createElement("li");
    li.append(a);
    return li;
  };

  const aside = document.createElement("aside");
  aside.className = "kd-sidebar";
  aside.setAttribute("aria-label", "ドキュメント");

  const brand = document.createElement("a");
  brand.className = "kd-brand";
  brand.href = root + "index.html";
  brand.innerHTML = "小谷はり灸所<small>kotani.page / docs</small>";
  aside.append(brand);

  for (const group of groups) {
    const section = document.createElement("section");
    section.className = "kd-group";
    const h2 = document.createElement("h2");
    h2.textContent = group.title;
    const ul = document.createElement("ul");

    if (group.index) ul.append(link(group.index.path, group.index.label));

    for (const item of group.items ?? []) ul.append(link(item.path, item.label, { indent: item.indent }));

    if (group.sessions) {
      for (const s of group.sessions.slice(0, SESSION_LIMIT)) ul.append(link(s.path, s.label, { indent: 1, meta: s.date.slice(5) }));
      if (group.sessions.length > SESSION_LIMIT) {
        const more = link(group.index.path, `全 ${group.sessions.length} 件を見る`, { indent: 1 });
        more.firstChild.classList.add("kd-more");
        ul.append(more);
      }
    }

    for (const issue of (group.issues ?? []).filter((i) => !i.done)) {
      ul.append(link(issue.path, issue.label, { indent: 1, priority: issue.priority }));
    }

    section.append(h2, ul);
    aside.append(section);
  }

  const toggle = document.createElement("button");
  toggle.className = "kd-toggle";
  toggle.type = "button";
  toggle.textContent = "目次";
  toggle.addEventListener("click", () => {
    aside.dataset.open = aside.dataset.open === "true" ? "false" : "true";
  });
  aside.addEventListener("click", (event) => {
    if (event.target === aside) aside.dataset.open = "false";
  });

  document.body.prepend(aside, toggle);
})();
