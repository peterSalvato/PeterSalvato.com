#!/bin/bash

echo "🛠️ Auto-generating missing Journal Config.yaml files..."

for dir in src/Journal/*; do
  [[ -d "$dir" ]] || continue
  cfg="$dir/Config.yaml"
  if [[ ! -f "$cfg" ]]; then
    base=$(basename "$dir")
    title="${base:11}"  # remove YYYY-MM-DD-
    slug=$(echo "$title" | tr '[:upper:]' '[:lower:]' | sed 's/ /-/g' | sed 's/[^a-z0-9-]//g')
    echo "📝 Creating $cfg"
    cat > "$cfg" <<EOF2
title: "$title"
slug: $slug
layout: Journal
group: Systems
EOF2
  fi
done

echo "✅ All missing Config.yaml files generated."
