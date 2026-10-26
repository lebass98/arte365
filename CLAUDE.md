# 아르떼365(Arte365) 웹진 프로젝트 가이드

본 문서는 아르떼365 웹진 퍼블리싱 및 개발 작업을 위한 Claude, Gemini, ChatGPT 공통 지침입니다.

---

## 1. 🧹 파일 관리 및 OS 메타데이터 방지 규칙 (필수)
- `.DS_Store`, `._*`, `Thumbs.db` 등 OS 종속 메타데이터 파일은 절대로 Git에 추적(커밋/스테이징)되어서는 안 됩니다.
- 작업 완료 후 불필요한 OS 아티팩트가 생성되었는지 상시 점검하고 즉시 정리합니다.
- **원고 작업 시 이미지 파일 생성 금지**: AI가 임의로 이미지를 생성하거나 리사이즈 파일을 만들지 않으며, 배포 규격에 맞는 이미지 경로 및 파일명(`/wp-content/uploads/{연도}/{월}/{파일명}.jpg`)만 마크업에 정확히 작성합니다.

---

## 2. 🐙 Git 형상 관리 및 커밋 가이드라인
- 커밋 메시지는 **한글**로 명확하고 간결하게 작성합니다.
- Conventional Commits 접두사를 준수합니다. (`feat:`, `fix:`, `refactor:`, `style:`, `docs:`, `chore:`)
- 작업 완료 후 `npm run build`로 빌드 정상 여부를 확인합니다.

---

## 3. 🛠️ 아르떼 웹진 전용 스킬 (원고작업-인터뷰)
- 인터뷰 기사 퍼블리싱 시 **`article-work-interview`** 스킬을 참조하여 작업합니다.
  - 경로: `.agents/skills/article-work-interview/SKILL.md` (전역 `~/.gemini/config/skills/`, `~/.claude/skills/`, `~/.codex/skills/` 공유)
  - 핵심 작업:
    1. 원고(`웹진발행/{연도}/{월}주/원고/인터뷰{N}/`)와 작업 이미지(`웹진발행/{연도}/{월}주/작업/interview{N}/`) 대조
    2. 본문 및 프로필 내 모든 소괄호 `(...)`에 파란색 작은 글씨 스타일(`<span style="display:inline;color:#2368c6;font-size:80%">(...)</span>`) 적용 (캡션 제외)
    3. 2열 이미지 수직 정렬 어긋남 방지 (`vertical-align: top;` 필수)
    4. 프로필 및 크레딧 블록 마크업 표준 준수
    5. 완성 HTML에는 **HTML 주석(`<!-- ... -->`)과 빈 줄을 남기지 않음**
    6. 이미지 파일명의 카테고리 뒤 숫자는 **같은 주에 같은 카테고리 기사가 2편 이상일 때만** 붙임 (카테고리가 서로 다르면 붙이지 않음) (1편뿐이면 `interview_{발행일}_01.jpg`, 2편이면 `interview1_`/`interview2_`)

---

## 4. 📰 아르떼 웹진 전용 스킬 (원고작업-뉴스레터)
- 주간 뉴스레터 퍼블리싱 시 **`newsletter-publish`** 스킬을 참조하여 작업합니다.
  - 경로: `.agents/skills/newsletter-publish/SKILL.md` (전역 `~/.gemini/config/skills/`, `~/.claude/skills/`, `~/.codex/skills/` 공유)
  - 작업 범위: 디자인팀이 전달한 뉴스레터 이미지 1장(`Newsletter_{YYYYMMDD}.jpg`) 위에 **alt 전문 · 이미지맵 좌표 · 링크**를 입히는 것
  - 핵심 작업:
    1. 원고 PDF는 **1페이지 뉴스레터 본문만** 사용 (`[메인페이지]`·`편집노트`·`[키워드별 큐레이션]` 항목은 제외)
    2. 좌표는 눈대중 금지 — `scripts/nlmap.py detect`로 추출하고, 이미지가 수정되면 전량 재추출
    3. `scripts/nlmap.py preview`로 영역↔링크 짝을 이미지 위에 겹쳐 검수
    4. 기사 ID·주제 ID·현장소식 지역명은 **지난 회차에서 복사하지 않고** 매회 갱신 (주제 ID는 `post_type=subjectgroup&as_post=` 검증)
    5. 하단 고정 문구(담당부서·전화번호·저작권 연도)는 매회 이미지와 대조

---

## 5. 🏠 아르떼 웹진 전용 스킬 (메인페이지 작업)
- 메인 페이지(frontpage) 퍼블리싱 시 **`mainpage-publish`** 스킬을 참조하여 작업합니다.
  - 경로: `.agents/skills/mainpage-publish/SKILL.md` (전역 `~/.gemini/config/skills/`, `~/.claude/skills/`, `~/.codex/skills/` 공유)
  - 작업 범위: `home-d.php`(PC), `home-m.php`(모바일), 메인 배너 CSS, `admin-ajax.php` 갱신
  - 핵심 작업:
    1. **PC/모바일 동기화**: `home-d.php`와 `home-m.php` 양쪽 모두에 동일한 현장소식/이달의 주제 적용 (한쪽 누락 금지)
    2. **현장소식 마크업**: `<!-- 현장소식 작업 시작 -->` 블록 내 진흥원 뱃지(`span.r`), 지역 뱃지(`span.b`), 특수문자 이스케이프(`&lt; &gt;`), 발행일자(`YYYY.MM.DD`) 적용
    3. **이달의 주제 갱신**: `.month-cont` 텍스트 및 편집노트 더보기(`?post_type=subjectgroup&as_post={주제ID}`) 링크 연결
    4. **메인 배너 슬라이더**: 인라인 이미지 URL 교체 및 `d-home.css`, `m-main.css` 배너 배경색 동기화
    5. **기사 AJAX 쿼리**: `wp-admin/admin-ajax.php`의 `before` 일자를 최신 발행일자로 갱신

---

## 6. 💡 아르떼 웹진 전용 스킬 (원고작업-이슈)
- 이슈(칼럼/에세이/정책담론) 기사 퍼블리싱 시 **`article-work-issue`** 스킬을 참조하여 작업합니다.
  - 경로: `.agents/skills/article-work-issue/SKILL.md` (전역 `~/.gemini/config/skills/`, `~/.claude/skills/`, `~/.codex/skills/` 공유)
  - 핵심 작업:
    1. 원고(`웹진발행/{연도}/{월}주/원고/`)의 모든 문단, 부제, 본문, 참고 문구 전수 대조
    2. 도입부 구분: **편집부 리드문**만 회색 박스(`<div class="posttextinin mt_25">`), 필자가 `*`로 쓴 주석은 파란 글씨 문단(`<div class="posttext mt_25" style="color:#2368c6">`) 적용
    3. 소제목은 밑줄 스타일(`<div class="posttit mt_50">`), 단 **숫자만 있는 섹션 번호는 `posttit` 금지** — 문단 머리 인라인 볼드(`<b style="font-size: 120%; font-weight: 600;">1.</b>`)로 처리 (발행본 221편 전수조사 기준, 선례 `?p=108969`)
    4. 본문 내 모든 소괄호 `(...)`에 파란색 작은 글씨 스타일(`<span style="display:inline;color:#2368c6;font-size:80%">(...)</span>`) 전수 적용 (캡션 및 필자 프로필 제외)
    5. 필자 프로필 블록(`<div class="postphotoin mt_45">`) 및 메일 링크(`mailto:`) 표준 마크업 준수 (필자 소개글 내 괄호는 일반 텍스트 유지)
    6. 참고/각주 문단은 `style="color:#2368c6"`만 사용 (`color:#666`·`font-size:14px` 등 임의 축소 스타일 금지)
    7. 완성 HTML에는 **HTML 주석(`<!-- ... -->`)과 빈 줄을 남기지 않음**
    8. 이미지 파일명의 카테고리 뒤 숫자는 **같은 주에 같은 카테고리 기사가 2편 이상일 때만** 붙임 (카테고리가 서로 다르면 붙이지 않음) (1편뿐이면 `issue_{발행일}_01.jpg`, 2편이면 `issue1_`/`issue2_`)


---

## 7. 📤 기사 HTML 작업폴더 산출 규칙 (필수 · 모든 기사 작업 공통)
`워드프레스/기사1.html`, `워드프레스/기사2.html` 등으로 퍼블리싱 작업을 완료하면, **별도 요청이 없어도** 아래 산출 작업까지 함께 수행합니다.

1. **산출 위치**: `웹진발행/{연도}/{월}주/작업/`
2. **파일명 규칙**: `{카테고리}_{대제목}_{작가}.html`
   - 카테고리: `이슈`, `인터뷰`, `현장` 등 원고 1페이지 상단의 분류명
   - 대제목: 원고 1페이지의 **큰 제목**(부제 아님)을 그대로 사용
   - 작가: 필자/인터뷰이 이름
   - 예) `이슈_어떤 주체의 출현과 책임에 관하여_백현주.html`, `인터뷰_어떤 판에서든, 좋아하는 일로 먹고사는 기쁨_김미선.html`
   - `기사1.html`·`기사2.html` 같은 임시 이름으로 남기지 않습니다.
3. **추출 범위**: 템플릿 include 라인(`{% include "templates/partials/header.html" %}` / `footer.html`)을 제거하고 `<div class="postall_w">` ~ 대응 닫는 `</div>`까지의 배포용 마크업만 저장합니다. (HTML 주석·빈 줄 없음)
4. 작업 후 `.DS_Store` 등 OS 메타데이터가 생성되지 않았는지 점검합니다.
