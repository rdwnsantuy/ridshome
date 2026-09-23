import json
from pathlib import Path
from collections import Counter

detect = json.loads(Path('graphify-out/.graphify_detect.json').read_text(encoding="utf-8"))
scan_root = Path('.').resolve()

counts = Counter()
for cat in ('code', 'document', 'paper', 'image', 'video'):
    for f in detect.get('files', {}).get(cat, []):
        p = Path(f).resolve()
        try:
            rel = p.relative_to(scan_root)
            parts = rel.parts
            if len(parts) > 1:
                counts[parts[0]] += 1
            else:
                counts['(root)'] += 1
        except Exception:
            pass

print("Top subdirectories by count:")
for d, c in counts.most_common(10):
    print(f"  {d}: {c} files")
