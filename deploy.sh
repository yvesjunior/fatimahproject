#!/bin/bash
set -e

# =============================================================
# Fatimah Project Mission — Production Deployment Script
# Run this on your Linux production server
# =============================================================

echo "========================================="
echo " Fatimah Project Mission - Deploy"
echo "========================================="

# --- Config defaults ---
DB_NAME="fatimaproject"
DB_USER="fatimaproject"
DB_PASS="changeme"
DB_ROOT_PASS="rootchangeme"
APP_PORT="80"
APP_URL="http://localhost"
APP_KEY="base64:o34i6XymJAqn2YcTn7w3ZD2+SX+6kzkjCsymfXVWmFs="

# --- Parse arguments ---
while [[ $# -gt 0 ]]; do
    case $1 in
        --db-pass) DB_PASS="$2"; shift 2;;
        --db-root-pass) DB_ROOT_PASS="$2"; shift 2;;
        --app-url) APP_URL="$2"; shift 2;;
        --port) APP_PORT="$2"; shift 2;;
        --load-image) LOAD_IMAGE=true; shift;;
        --help)
            echo "Usage: ./deploy.sh [OPTIONS]"
            echo ""
            echo "Options:"
            echo "  --db-pass PASSWORD       MariaDB password for app user (default: changeme)"
            echo "  --db-root-pass PASSWORD  MariaDB root password (default: rootchangeme)"
            echo "  --app-url URL            Public URL (default: http://localhost)"
            echo "  --port PORT              Web port (default: 80)"
            echo "  --load-image             Load Docker image from fatimaproject-prod.tar.gz"
            echo ""
            echo "Examples:"
            echo "  First deploy:  ./deploy.sh --db-pass secret123 --db-root-pass rootsecret --app-url https://example.com --load-image"
            echo "  Restart:       ./deploy.sh --db-pass secret123 --app-url https://example.com"
            exit 0;;
        *) echo "Unknown option: $1"; exit 1;;
    esac
done

SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
cd "$SCRIPT_DIR"

# --- Step 1: Load Docker image ---
if [ "$LOAD_IMAGE" = true ]; then
    echo ""
    echo "[1/3] Loading Docker image..."
    if [ ! -f fatimaproject-prod.tar.gz ]; then
        echo "ERROR: fatimaproject-prod.tar.gz not found in $SCRIPT_DIR"
        exit 1
    fi
    docker load < fatimaproject-prod.tar.gz
    echo "  Done."
else
    echo ""
    echo "[1/3] Skipping image load (use --load-image to load)"
fi

# --- Step 2: Create .env file ---
echo ""
echo "[2/3] Writing .env..."
cat > .env <<ENVFILE
WEB_PORT=${APP_PORT}
APP_KEY=${APP_KEY}
APP_URL=${APP_URL}

DB_ROOT_PASSWORD=${DB_ROOT_PASS}
DB_DATABASE=${DB_NAME}
DB_USERNAME=${DB_USER}
DB_PASSWORD=${DB_PASS}
ENVFILE
echo "  Done."

# --- Step 3: Start containers ---
echo ""
echo "[3/3] Starting containers..."

# Check if DB SQL file exists for initial import
if [ ! -f fatimaproject_db.sql ]; then
    echo "  WARNING: fatimaproject_db.sql not found. DB will start empty and migrations will create tables."
fi

docker compose -f docker-compose.prod.yml down 2>/dev/null || true
docker compose -f docker-compose.prod.yml up -d

echo ""
echo "  Waiting for services to be ready..."
sleep 10

echo ""
echo "========================================="
echo " Deployment complete!"
echo ""
echo " Site:  ${APP_URL}"
echo " Admin: ${APP_URL}/admin"
echo " Login: admin@fatimaproject.org / password"
echo "========================================="
echo ""
echo "IMPORTANT: Change the admin password after first login!"
echo ""
echo "To check logs:  docker logs fatimaproject"
echo "To stop:        docker compose -f docker-compose.prod.yml down"
