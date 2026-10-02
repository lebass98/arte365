# 아르떼365(Arte365) 웹진 프로젝트 가이드

본 문서는 아르떼365 웹진 퍼블리싱 및 개발 작업을 위한 Claude, Gemini, ChatGPT 공통 지침입니다.

---

## 1. 🧹 파일 관리 및 OS 메타데이터 방지 규칙 (필수)
- `.DS_Store`, `._*`, `Thumbs.db` 등 OS 종속 메타데이터 파일은 절대로 Git에 추적(커밋/스테이징)되어서는 안 됩니다.
- 작업 완료 후 불필요한 OS 아티팩트가 생성되었는지 상시 점검하고 즉시 정리합니다.

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

