#!/bin/bash
set -e

echo "🛠️ Scaffolding all remaining journal + project entries..."

# === Missing Journal Entries ===
declare -A journalEntries=(
  ["2025-04-12-SavepointProtocol"]="savepoint-protocol|Savepoint Protocol|Essay"
  ["2025-04-18-OnEmergence"]="on-emergence|On Emergence|Essay"
)

for dir in "${!journalEntries[@]}"; do
  IFS="|" read -r slug title type <<< "${journalEntries[$dir]}"
  base="src/Journal/$dir"
  mkdir -p "$base/Images"
  [[ -f "$base/Config.yaml" ]] || cat > "$base/Config.yaml" <<EOF
title: "$title"
slug: $slug
date: ${dir:0:10}
tags: []
status: draft
summary: ""
EOF
  [[ -f "$base/Entry.md" ]] || echo "# $title" > "$base/Entry.md"
  echo "✅ Journal scaffolded: $dir"
done

# === Missing Projects ===
declare -A projects=(
  ["EchoAndBone"]="echo-and-bone|Artifacts|Explainer"
  ["TheDeepCuts"]="the-deep-cuts|Artifacts|Gallery"
  ["Photogeography"]="photogeography|ConceptualProjects|Gallery"
  ["Versograms"]="versograms|ConceptualProjects|Gallery"
)

for folder in "${!projects[@]}"; do
  IFS="|" read -r slug group layout <<< "${projects[$folder]}"
  base="src/Projects/$folder"
  mkdir -p "$base/Images"
  [[ -f "$base/Config.yaml" ]] || cat > "$base/Config.yaml" <<EOF
title: "$(echo $folder | sed 's/\([a-z]\)\([A-Z]\)/\1 \2/g')"
slug: $slug
group: $group
layout: $layout
summary: ""
EOF
  echo "✅ Project scaffolded: $folder"
done

echo "🏁 All missing content scaffolded."
